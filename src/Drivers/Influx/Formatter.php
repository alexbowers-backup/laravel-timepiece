<?php

namespace AlexBowers\Timepiece\Drivers\Influx;

use AlexBowers\Timepiece\Builder;

class Formatter
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function select()
    {
        return implode(', ', $this->builder->select ?? ['*']);
    }

    public function from()
    {
        return "\"{$this->builder->from()}\"";
    }
}