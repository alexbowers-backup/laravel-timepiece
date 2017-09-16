<?php

namespace AlexBowers\Timepiece;

use Illuminate\Support\ServiceProvider;
use InfluxDB\Client;

class TimepieceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/timepiece.php' => config_path('timepiece.php'),
        ]);
    }

    public function register()
    {
        $this->configure();
        $this->registerServices();
    }

    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/timepiece.php',
            'timepiece'
        );
    }

    protected function registerServices()
    {
        $timepiece_config = config('timepiece');

        $this->app->bind(Client::class, function () use ($timepiece_config) {
            $connection = $timepiece_config['connections'][$timepiece_config['use']];

            return new Client(
                $connection['host'],
                $connection['port'],
                $connection['username'],
                $connection['password'],
                $connection['ssl'],
                $connection['verify_ssl'],
                $connection['timeout']
            );
        });

        $this->app->bind(Connection::class, function () {
            switch (config('timepiece.use')) {
                case 'influx':
                    return app(InfluxConnection::class);
                    break;
                default:
                    throw new \Exception("Unexpected timepiece type.");
                    break;
            }
        });
    }
}