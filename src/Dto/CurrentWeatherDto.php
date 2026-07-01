<?php

namespace App\Dto;

class CurrentWeatherDto
{
    private ?\DateTimeImmutable $time = null;
    private int $interval = 0;
    private float $temperature = 0;
    private int $weatherCode = 0;
    private string $temperatureUnit = 'default';
    private float $relativeHumidity = 0.0;
    private float $apparentTemperature = 0.0;
    private float $windSpeed = 0.0;
    private bool $isDay = false;
    private float $surfacePressure = 0.0;
    private string $relativeHumidityUnit = 'default';
    private string $windSpeedUnit = 'default';
    private string $surfacePressureUnit = 'default';

    public function __construct(){}

    public function getWeatherDescription(): string
    {
        return WeatherCode::getDescription($this->weatherCode);
    }
    public function getRelativeHumidity(): float
    {
        return $this->relativeHumidity;
    }

    public function setRelativeHumidity(float $relativeHumidity): void
    {
        $this->relativeHumidity = $relativeHumidity;
    }

    public function getApparentTemperature(): float
    {
        return $this->apparentTemperature;
    }

    public function setApparentTemperature(float $apparentTemperature): void
    {
        $this->apparentTemperature = $apparentTemperature;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(float $windSpeed): void
    {
        $this->windSpeed = $windSpeed;
    }

    public function isDay(): bool
    {
        return $this->isDay;
    }

    public function setIsDay(bool $isDay): void
    {
        $this->isDay = $isDay;
    }

    public function getSurfacePressure(): float
    {
        return $this->surfacePressure;
    }

    public function setSurfacePressure(float $surfacePressure): void
    {
        $this->surfacePressure = $surfacePressure;
    }

    public function getRelativeHumidityUnit(): string
    {
        return $this->relativeHumidityUnit;
    }

    public function setRelativeHumidityUnit(string $relativeHumidityUnit): void
    {
        $this->relativeHumidityUnit = $relativeHumidityUnit;
    }

    public function getWindSpeedUnit(): string
    {
        return $this->windSpeedUnit;
    }

    public function setWindSpeedUnit(string $windSpeedUnit): void
    {
        $this->windSpeedUnit = $windSpeedUnit;
    }

    public function getSurfacePressureUnit(): string
    {
        return $this->surfacePressureUnit;
    }

    public function setSurfacePressureUnit(string $surfacePressureUnit): void
    {
        $this->surfacePressureUnit = $surfacePressureUnit;
    }



    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function getTemperatureUnit(): string
    {
        return $this->temperatureUnit;
    }

    public function setTemperatureUnit(string $temperatureUnit): void
    {
        $this->temperatureUnit = $temperatureUnit;
    }


    public function getTime(): \DateTimeImmutable
    {
        return $this->time;
    }

    public function setTime(\DateTimeImmutable $time): void
    {
        $this->time = $time;
    }

    public function getInterval(): int
    {
        return $this->interval;
    }

    public function setInterval(int $interval): void
    {
        $this->interval = $interval;
    }
    public function getWeatherCode(): int
    {
        return $this->weatherCode;
    }

    public function setWeatherCode(int $weatherCode): void
    {
        $this->weatherCode = $weatherCode;
    }


}
