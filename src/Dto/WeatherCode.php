<?php

namespace App\Dto;

class WeatherCode
{
    private static array $map = [
        0 => 'Clear sky',
        1 => 'Mainly clear, partly cloudy, and overcast',
        2 => 'Mainly clear, partly cloudy, and overcast',
        3 => 'Mainly clear, partly cloudy, and overcast',
        45 => 'Fog and depositing rime fog',
        48 => 'Fog and depositing rime fog',
        51 => 'Drizzle: Light, moderate, and dense intensity',
        53 => 'Drizzle: Light, moderate, and dense intensity',
        55 => 'Drizzle: Light, moderate, and dense intensity',
        56 => 'Freezing Drizzle: Light and dense intensity',
        57 => 'Freezing Drizzle: Light and dense intensity',
        61 => 'Rain: Slight, moderate and heavy intensity',
        63 => 'Rain: Slight, moderate and heavy intensity',
        65 => 'Rain: Slight, moderate and heavy intensity',
        66 => 'Freezing Rain: Light and heavy intensity',
        67 => 'Freezing Rain: Light and heavy intensity',
        71 => 'Snow fall: Slight, moderate, and heavy intensity',
        73 => 'Snow fall: Slight, moderate, and heavy intensity',
        75 => 'Snow fall: Slight, moderate, and heavy intensity',
        77 => 'Snow grains',
        80 => 'Rain showers: Slight, moderate, and violent',
        81 => 'Rain showers: Slight, moderate, and violent',
        82 => 'Rain showers: Slight, moderate, and violent',
        85 => 'Snow showers slight and heavy',
        86 => 'Snow showers slight and heavy',
        95 => 'Thunderstorm: Slight or moderate',
        96 => 'Thunderstorm with slight and heavy hail',
        99 => 'Thunderstorm with slight and heavy hail'
    ];

    public static function getDescription(int $code): string
    {
        return self::$map[$code] ?? 'Unknown weather code';
    }

    public static function getIconName(int $code): string
    {
        return match($code){
            0 => 'clearSky.svg',
            1, 2, 3=> 'mainlyClear.svg',
            45, 48 => 'fog.svg',
            51, 53, 55 => 'drizzle.svg',
            56, 57 => 'freezingDrizzle.svg',
            61, 63, 65 => 'rain.svg',
            66, 67 => 'freezingRain.svg',
            71, 73, 75 => 'snow.svg',
            77 => 'snowGrains.svg',
            80, 81, 82 => 'rainShowers.svg',
            85, 86 => 'snowShowers.svg',
            95 => 'thunderStorm.svg',
            96, 99 => 'hail.svg',
            default => 'unknown.svg'
        };
    }
}
