<?php

namespace App\Builder;

use App\Dto\CurrentWeatherDto;
use App\Dto\WeatherResponseDto;

class CurrentWeatherBuilder
{
    public static function buildFromDto(
        WeatherResponseDto $weatherResponse
    ): CurrentWeatherDto
    {
           $currentWeather = new CurrentWeatherDto();
           $currentWeather->setInterval($weatherResponse->getCurrent()['interval']);
           $currentWeather->setTime(\DateTimeImmutable::createFromFormat('Y-m-d\TH:i', $weatherResponse->getCurrent()['time']));
           $currentWeather->setTemperature($weatherResponse->getCurrent()['temperature_2m']);
           $currentWeather->setWeatherCode($weatherResponse->getCurrent()['weather_code']);
           $currentWeather->setTemperatureUnit($weatherResponse->getCurrentUnits()['temperature_2m']);
           $currentWeather->setApparentTemperature($weatherResponse->getCurrent()['apparent_temperature']);
           $currentWeather->setIsDay($weatherResponse->getCurrent()['is_day']);
           $currentWeather->setRelativeHumidity($weatherResponse->getCurrent()['relative_humidity_2m']);
           $currentWeather->setRelativeHumidityUnit($weatherResponse->getCurrentUnits()['relative_humidity_2m']);
           $currentWeather->setWindSpeed($weatherResponse->getCurrent()['wind_speed_10m']);
           $currentWeather->setWindSpeedUnit($weatherResponse->getCurrentUnits()['wind_speed_10m']);
           $currentWeather->setSurfacePressure($weatherResponse->getCurrent()['surface_pressure']);
           $currentWeather->setSurfacePressureUnit($weatherResponse->getCurrentUnits()['surface_pressure']);

           return $currentWeather;
    }
}
