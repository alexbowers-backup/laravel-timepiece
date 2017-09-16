<?php

namespace AlexBowers\Timepiece;

use AlexBowers\Timepiece\Schema\InfluxBuilder;
use InfluxDB\Client;

class InfluxConnection extends Connection
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getBuilder(string $database)
    {

        return new InfluxBuilder(
            $this->client->selectDB($database)
        );
    }
}