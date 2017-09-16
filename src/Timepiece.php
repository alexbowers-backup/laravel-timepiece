<?php

namespace AlexBowers\Timepiece;

use AlexBowers\Timepiece\Schema\Builder;
use Illuminate\Support\Str;

class Timepiece
{
    protected $connection;

    protected $database;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

        if (!isset($this->database)) {
            $class_name = class_basename(static::class);

            $plural_class_name = str_plural($class_name);

            $snake = Str::snake($plural_class_name);

            $this->database = str_replace('\\', '', $snake);
        }
    }

    public static function select($fields = '*')
    {
        return self::getInstance()->select($fields);
    }

    /**
     * @return Builder
     */
    private static function getInstance()
    {
        $instance = app(static::class);

        return $instance->connection->getBuilder(
            $instance->database
        );
    }
}