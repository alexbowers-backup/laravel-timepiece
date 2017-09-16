<?php

namespace AlexBowers\Timepiece\Schema;

class Builder
{
    protected $client;

    protected $select = ['*'];

    protected $where = [];

    protected $limit;

    public function select($fields = '*')
    {
        $this->select = (array) $fields;

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