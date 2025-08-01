<?php

namespace App\DTO;

class WeatherDTO
{
    public function __construct(
        public string $city,
        public float $temperature,
        public string $description,
        public int $humidity,
        public float $windSpeed
    ) {}
}
