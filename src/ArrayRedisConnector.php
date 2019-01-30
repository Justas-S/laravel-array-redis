<?php

namespace AragornYang\ArrayRedis;

use Illuminate\Redis\Connections\PredisConnection;
use Illuminate\Support\Arr;
use M6Web\Component\RedisMock\RedisMockFactory;
use Predis\Client;

/**
 * fake \Illuminate\Redis\Connectors\PredisConnector
 */
class ArrayRedisConnector
{
    /**
     * Create a new clustered Predis connection.
     *
     * @param  array $config
     * @param  array $options
     * @return PredisConnection
     */
    public function connect(array $config, array $options): PredisConnection
    {
        $formattedOptions = array_merge(
            ['timeout' => 10.0], $options, Arr::pull($config, 'options', [])
        );
        $clientClass = $this->getClientClass();
        return new PredisConnection(new $clientClass($config, $formattedOptions));
    }

    /**
     * Create a new clustered Predis connection.
     *
     * @param  array $config
     * @param  array $clusterOptions
     * @param  array $options
     * @return PredisConnection
     */
    public function connectToCluster(array $config, array $clusterOptions, array $options): PredisConnection
    {
        $clusterSpecificOptions = Arr::pull($config, 'options', []);
        $clientClass = $this->getClientClass();
        return new PredisConnection(new $clientClass(array_values($config), array_merge(
            $options, $clusterOptions, $clusterSpecificOptions
        )));
    }

    protected function getClientClass()
    {
        return (new RedisMockFactory())->getAdapter(Client::class, true);
    }
}