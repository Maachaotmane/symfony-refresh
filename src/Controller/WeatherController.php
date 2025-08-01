<?php

namespace App\Controller;

use App\Service\Weather\WeatherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/api/weather/{city}', name: 'api_weather', methods: ['GET'])]
    public function weather(string $city, WeatherService $weatherService): JsonResponse
    {
        $data = $weatherService->getWeather($city);

        return new JsonResponse($data);
    }
}
