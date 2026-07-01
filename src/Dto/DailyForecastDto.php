<?php

namespace App\Dto;

class DailyForecastDto
{
    private array $days;

    public function __construct(){}

    public function getDays(): array
    {
        return $this->days;
    }

    public function setDays(array $days): void
    {
        $this->days = $days;
    }


}
