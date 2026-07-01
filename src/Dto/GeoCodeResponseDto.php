<?php

namespace App\Dto;

class GeoCodeResponseDto
{
    private string $name = 'default';
    private float $latitude = 0.0;
    private float $longitude = 0.0;
    private float $elevation = 0.0;
    private string $feature_code = 'default';
    private string $country_code = 'default';
    private string $timezone = 'default';
    private int $population = 0;
    private array $postcodes = [];
    private string $country = 'default';

    public function __construct(){}



    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getElevation(): float
    {
        return $this->elevation;
    }

    public function setElevation(float $elevation): void
    {
        $this->elevation = $elevation;
    }

    public function getFeatureCode(): string
    {
        return $this->feature_code;
    }

    public function setFeatureCode(string $feature_code): void
    {
        $this->feature_code = $feature_code;
    }

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): void
    {
        $this->country_code = $country_code;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function setPopulation(int $population): void
    {
        $this->population = $population;
    }

    public function getPostcodes(): array
    {
        return $this->postcodes;
    }

    public function setPostcodes(array $postcodes): void
    {
        $this->postcodes = $postcodes;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }




}
