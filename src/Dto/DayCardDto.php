<?php

namespace App\Dto;

class DayCardDto
{
    private float $temperatureMin;
    private float $temperatureMax;
    private string $temperatureUnit;
    private int $weatherCode;
    private \DateTimeImmutable $date;


    public function __construct(){}

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;
        return $this;
    }


    public function getIconName(): string
    {
        return WeatherCode::getIconName($this->weatherCode);
    }

    public function getWeatherCode(): int
    {
        return $this->weatherCode;
    }

    public function setWeatherCode(int $weatherCode): self
    {
        $this->weatherCode = $weatherCode;
        return $this;
    }


    public function getTemperatureMin(): float
    {
        return $this->temperatureMin;
    }

    public function setTemperatureMin(float $temperatureMin): self
    {
        $this->temperatureMin = $temperatureMin;
        return $this;
    }

    public function getTemperatureMax(): float
    {
        return $this->temperatureMax;
    }

    public function setTemperatureMax(float $temperatureMax): self
    {
        $this->temperatureMax = $temperatureMax;
        return $this;
    }

    public function getTemperatureUnit(): string
    {
        return $this->temperatureUnit;
    }

    public function setTemperatureUnit(string $temperatureUnit): self
    {
        $this->temperatureUnit = $temperatureUnit;
        return $this;
    }


}
