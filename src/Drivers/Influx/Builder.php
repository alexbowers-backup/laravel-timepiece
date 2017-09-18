<?php

namespace AlexBowers\Timepiece\Drivers\Influx;

use AlexBowers\Timepiece\Builder as CoreBuilder;
use InfluxDB\Database;

class Builder extends CoreBuilder
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function get()
    {
        $formatted = new Formatter($this);

        $query = $this->database->query(<<<QUERY
select {$formatted->select()} from {$formatted->from()}
QUERY
);

        dd($query);
    }
}