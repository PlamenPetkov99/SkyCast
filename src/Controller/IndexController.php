<?php

namespace App\Controller;

use App\Builder\CurrentWeatherBuilder;
use App\Builder\DailyForecastBuilder;
use App\Dto\CityDto;
use App\Dto\GeoCodeResponseDto;
use App\Dto\GeoResponseDto;
use App\Dto\WeatherResponseDto;
use App\Form\SearchWeatherType;
use App\Manager\GeoCodeRequestManager;
use App\Manager\WeatherRequestManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Point;

final class IndexController extends AbstractController
{
    public function __construct(
        private readonly GeoCodeRequestManager $geoCodeRequestManager,
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly DenormalizerInterface $denormalizer,
        private readonly WeatherRequestManager $weatherRequestManager,

    ){}

    #[Route('/',name:'default')]
    public function toIndex(): Response
    {
        return $this->redirectToRoute('app_index');
    }

    #[Route('/index', name: 'app_index')]
    public function index(Request $request): Response
    {
        $cityDto = new CityDto();
        $form = $this->createForm(SearchWeatherType::class, $cityDto);
        $form->handleRequest($request);
        $weather = [];
        $map = new Map('default')->fitBoundsToMarkers(true)->options(
            new LeafletOptions()->tileLayer(
                new TileLayer(
                    url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                )
            )
        );
        if($form->isSubmitted() && $form->isValid()){
            $location = $this->geoCodeRequestManager->get($cityDto->getName());
            $geoResponseDto = $this->serializer->deserialize($location->getContent(), GeoResponseDto::class, 'json');
            $errors = $this->validator->validate($geoResponseDto);
            if (count($errors) > 0) {
                $form->addError(new FormError('Error finding the city'));
            }
            else{
                $geoCodeResponseDto = $this->denormalizer->denormalize($geoResponseDto->getResults(), GeoCodeResponseDto::class,'array');

                $weatherResponse = $this->weatherRequestManager->get($geoCodeResponseDto->getLatitude(), $geoCodeResponseDto->getLongitude());
                $weatherResponseDto = $this->denormalizer->denormalize($weatherResponse->toArray(), WeatherResponseDto::class, 'array');

                $currentWeather = CurrentWeatherBuilder::buildFromDto($weatherResponseDto);

                $dailyWeatherForecast = DailyForecastBuilder::buildFromDto($weatherResponseDto);

                $weather['currentWeather'] = $currentWeather;
                $weather['geoCodeResponseDto'] = $geoCodeResponseDto;
                $weather['dailyWeatherForecast'] = $dailyWeatherForecast;

            }

        }

        return $this->render('index/index.html.twig', [
            'form' => $form,
            'weather' => $weather,
            'map' => $map
        ],
        new Response(null,200));
    }
}
