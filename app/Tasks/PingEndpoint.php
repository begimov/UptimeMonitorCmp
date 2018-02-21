<?php

namespace App\Tasks;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PingEndpoint
{
    protected $guzzle;
    protected $endpoint;

    public function __construct($endpoint, Client $guzzle)
    {
        $this->guzzle = $guzzle;
        $this->endpoint = $endpoint;
    }

    public function handle()
    {
        try {
            $response = $this->guzzle->request('GET', $this->endpoint->uri);
        } catch (RequestException $e) {
            dump($e->getResponse()->getStatusCode());
        }
    }
}
