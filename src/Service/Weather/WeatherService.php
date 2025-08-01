<?php

namespace App\Service\Weather;

use App\DTO\WeatherDTO;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherService
{
    
    public function __construct(
        private HttpClientInterface $httpClient,
        private $apiKey,
    ) {
    }

    public function getWeather($city): WeatherDTO
    {
        $response = $this->httpClient->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
            ],
        ]);

        $data = $response->toArray();

        return new WeatherDTO(
            city: $data['name'],
            temperature: $data['main']['temp'],
            description: $data['weather'][0]['description'],
            humidity: $data['main']['humidity'],
            windSpeed: $data['wind']['speed']
        );
    }
}
