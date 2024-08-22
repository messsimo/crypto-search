<?php
namespace App\Services;

use GuzzleHttp\Client;

class CryptoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.coingecko.com/api/v3/',
        ]);
    }

    public function getTopCryptos($limit = 30)
    {
        $response = $this->client->get("coins/markets", [
            'query' => [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => $limit,
                'page' => 1,
                'sparkline' => false,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}