<?php

namespace AlexBowers\Timepiece\Drivers\Influx;

use AlexBowers\Timepiece\Connection as CoreConnection;
use InfluxDB\Client;

class Connection extends CoreConnection
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getBuilder(string $database)
    {

        return new Builder(
            $this->client->selectDB($database)
        );
    }
}