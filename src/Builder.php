<?php

namespace AlexBowers\Timepiece;

class Builder
{
    protected $client;

    public $select = ['*'];

    public $from;

    public $where = [];

    public $limit;

    public function select($fields = '*')
    {
        $this->select = (array) $fields;

        return $this;
    }

    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->where[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];

        return $this;
    }

    public function getQuery()
    {

    }
}