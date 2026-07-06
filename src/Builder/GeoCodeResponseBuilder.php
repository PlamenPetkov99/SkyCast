<?php

namespace App\Builder;

use App\Dto\GeoCodeResponseDto;
use App\Dto\ReversedGeoResponseDto;

class GeoCodeResponseBuilder
{
    public static function buildFromReverseGeo(ReversedGeoResponseDto $reversedGeoResponseDto): GeoCodeResponseDto
    {
        $geoCodeResponseDto = new GeoCodeResponseDto();

        $geoCodeResponseDto->setName($reversedGeoResponseDto->getCity());
        $geoCodeResponseDto->setLatitude($reversedGeoResponseDto->getLatitude());
        $geoCodeResponseDto->setLongitude($reversedGeoResponseDto->getLongitude());

        return $geoCodeResponseDto;
    }
}
