<?php

namespace AragornYang\ArrayRedis;

use Illuminate\Redis\Connectors\PhpRedisConnector;
use Illuminate\Redis\Connectors\PredisConnector;
use Illuminate\Redis\RedisManager;

class ArrayRedisManager extends RedisManager
{
    /**
     * Get the connector instance for the current driver.
     *
     * @return PhpRedisConnector|PredisConnector|ArrayRedisConnector
     */
    protected function connector()
    {
        switch ($this->driver) {
            case 'predis':
                return new PredisConnector;
            case 'phpredis':
                return new PhpRedisConnector;
            case 'array':
                return new ArrayRedisConnector;
        }
    }
}