<?php

namespace App\Tasks;

use GuzzleHttp\Client;

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
        dump($this->endpoint->uri);
    }
}
