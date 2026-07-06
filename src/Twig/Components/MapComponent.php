<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\Map\Live\ComponentWithMapTrait;
use Symfony\UX\Map\Map;

#[AsLiveComponent]
final class MapComponent
{
    use DefaultActionTrait;
    use ComponentWithMapTrait;
    #[LiveProp(writable: true)]
    public ?float $latitude;
    #[LiveProp(writable: true)]
    public ?float $longitude;
    #[LiveProp(writable: true)]
    public ?string $cityName;
    #[LiveProp(writable: true)]
    public ?float $temperature;

    protected function instantiateMap(): Map
    {
        return new Map()->fitBoundsToMarkers(true);
    }
}
