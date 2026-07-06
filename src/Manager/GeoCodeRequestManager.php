<?php

namespace App\Manager;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeoCodeRequestManager
{
    public function __construct(
        private readonly HttpClientInterface $client
    ){}

    public function reverse(float $latitude , float $longitude)
    {
        return $this->client->request(
            'GET',
            'https://api.bigdatacloud.net/data/reverse-geocode-client',
            [
                'query' => [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'localityLanguage' => 'en'
                ],
            ]
        );

    }
    public function get(string $city){
        return $this->client->request(
            'GET',
            'https://geocoding-api.open-meteo.com/v1/search',
            [
                'query' => [
                    'name' => $city,
                    'count' => 1,
                    'language' => 'en',
                    'format' => 'json'
                ]
            ]
        );
    }
}
