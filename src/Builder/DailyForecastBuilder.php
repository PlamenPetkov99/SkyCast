<?php

namespace App\Builder;

use App\Dto\DailyForecastDto;
use App\Dto\DayCardDto;
use App\Dto\WeatherResponseDto;

class DailyForecastBuilder
{
    public static function buildFromDto(WeatherResponseDto $weatherResponseDto): DailyForecastDto
    {
        $dailyForecast = new DailyForecastDto();
        $temperatureUnit = $weatherResponseDto->getDailyUnits()['temperature_2m_max'];

        $daily = $weatherResponseDto->getDaily();
        $dailyForecast->setDays(
            array_map(
                static fn(int $index) => new DayCardDto()
                ->setTemperatureMax($daily['temperature_2m_max'][$index])
                ->setDate(new \DateTimeImmutable($daily['time'][$index]))
                ->setTemperatureMin($daily['temperature_2m_min'][$index])
                ->setWeatherCode($daily['weather_code'][$index])
                ->setTemperatureUnit($temperatureUnit),
            array_keys($daily['time'])
            )
        );

        return $dailyForecast;
    }
}
