<?php

namespace App\Manager;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherRequestManager
{
    public function __construct(
        private readonly HttpClientInterface $client
    ){}

    public function get(
        float $latitude,
        float $longtitude,
    ){
        return $this->client->request(
            'GET',
            'https://api.open-meteo.com/v1/forecast',
            [
                'query' => [
                    'latitude' => $latitude,
                    'longitude' => $longtitude,
                    'current' => implode(',', [
                        'temperature_2m',
                        'relative_humidity_2m',
                        'apparent_temperature',
                        'weather_code',
                        'wind_speed_10m',
                        'wind_direction_10m',
                        'surface_pressure',
                        'is_day',
                    ]),
                    'daily' => implode(',', [
                        'weather_code',
                        'temperature_2m_max',
                        'temperature_2m_min',
                        'precipitation_probability_max',
                        'wind_speed_10m_max',
                    ]),
                    'forecast_days' => 5,
                    'timezone' => 'auto'
                ]
            ]
        );
    }
}
