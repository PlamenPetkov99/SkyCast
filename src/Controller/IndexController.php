<?php

namespace App\Controller;

use App\Builder\CurrentWeatherBuilder;
use App\Builder\CurrentWeatherUnitsBuilder;
use App\Builder\DailyForecastBuilder;
use App\Builder\DailyForecastUnitBuilder;
use App\Builder\GeoCodeViewBuilder;
use App\Builder\RequestInputDataDtoBuilder;
use App\Dto\CityDto;
use App\Dto\GeoResponseDto;
use App\Dto\WeatherDto;
use App\Form\SearchWeatherType;
use App\Manager\GeoCodeRequestManager;
use App\Manager\MapManager;
use App\Manager\ReverseGeoCodeRequestManager;
use App\Manager\WeatherRequestManager;
use App\Trait\Parser;
use App\ViewModel\GeoCodeViewModel;
use App\ViewModel\WeatherViewModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class IndexController extends AbstractController
{
    use Parser;
    public function __construct(
        private readonly GeoCodeRequestManager $geoCodeRequestManager,
        private readonly ValidatorInterface $validator,
        private readonly WeatherRequestManager $weatherRequestManager,
        private readonly MapManager $mapManager,
        private readonly RequestInputDataDtoBuilder $requestInputDataDtoBuilder,
        private readonly ReverseGeoCodeRequestManager $reverseGeoCodeRequestManager,
    ){}

    #[Route('/', name: 'app_index')]
    public function index(
        Request $request,
        #[MapQueryParameter] ?float $lat,
        #[MapQueryParameter] ?float $lng,
    ): Response
    {
        $cityDto = new CityDto();
        $form = $this->createForm(SearchWeatherType::class, $cityDto);
        $form->handleRequest($request);
        $weather = null;

        if($form->isSubmitted() && $form->isValid()){

            $location = $this->geoCodeRequestManager->get(
                $this->requestInputDataDtoBuilder
                    ->withCity($cityDto->getName())
                    ->build()
            );

            $geoResponseDto = $this->parseFromJson($location->getContent(), GeoResponseDto::class);

            $errors = $this->validator->validate($geoResponseDto);
            if (count($errors) > 0) {
                $form->addError(new FormError('Error finding the city'));
            }
            else{

                $geoCodeView = $this->parseFromArray($geoResponseDto->getResults(), GeoCodeViewModel::class);

                $weatherResponse = $this->fetchWeather($geoCodeView);


                $weatherDto = $this->parseFromArray($weatherResponse->toArray(), WeatherDto::class);

                $weather = $this->buildWeather(
                    $geoCodeView,
                    $weatherDto
                );

            }
        }
        elseif ($lat !== null && $lng !== null){

            $reversedLocation = $this->reverseGeoCodeRequestManager->get(
                $this->requestInputDataDtoBuilder
                ->withLatitude($lat)
                ->withLongtitude($lng)
                ->build()
            );

            $geoCodeView = GeoCodeViewBuilder::build($reversedLocation->toArray());

            $weatherResponse = $this->fetchWeather($geoCodeView);

            $weatherDto = $this->parseFromArray($weatherResponse->toArray(), WeatherDto::class);

            $weather = $this->buildWeather(
                $geoCodeView,
                $weatherDto
            );

            $form->get('name')->setData($geoCodeView->getName());
        }

        return $this->render('index/index.html.twig', [
            'form' => $form,
            'weather' => $weather,
            'map' => $this->mapManager->buildMap(),
        ],
        new Response(null,200));
    }

    private function fetchWeather(GeoCodeViewModel $geoCodeViewModel): ResponseInterface
    {
        return $this->weatherRequestManager->get(
            $this->requestInputDataDtoBuilder
                ->withLatitude($geoCodeViewModel->getLatitude())
                ->withLongtitude($geoCodeViewModel->getLongitude())
                ->build()
        );
    }

    private function buildWeather(
        GeoCodeViewModel $geoCodeViewModel,
        WeatherDto $weatherDto
    ): WeatherViewModel
    {
        return new WeatherViewModel()
            ->setGeoCodeViewModel($geoCodeViewModel)
            ->setDailyForecastUnitsDto(DailyForecastUnitBuilder::build($weatherDto))
            ->setDailyForecastDto(DailyForecastBuilder::build($weatherDto))
            ->setCurrentWeatherUnitsDto(CurrentWeatherUnitsBuilder::build($weatherDto))
            ->setCurrentWeatherDto(CurrentWeatherBuilder::build($weatherDto));
    }
}
