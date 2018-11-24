<?php

namespace App\Http\Connections;

use GuzzleHttp\Client;

/**
 * Class RestConnection
 * @package App\Http\Connections
 */
class Connection
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Connection constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAirQualityData()
    {
        return $this->client->request('GET', 'http://dosairnowdata.org/dos/RSS/Sarajevo/Sarajevo-PM2.5.xml');
    }
}