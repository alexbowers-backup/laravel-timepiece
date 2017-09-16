<?php

namespace AlexBowers\Timepiece\Schema;

use InfluxDB\Database;

class InfluxBuilder extends Builder
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function get()
    {
        $this->database->query(<<<QUERY
select {$this->select} from {$this->from}
QUERY
);

        dd($this);
    }
}