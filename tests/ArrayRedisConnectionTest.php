<?php

namespace AragornYang\ArrayRedis\Tests;

use AragornYang\ArrayRedis\ArrayRedisServiceProvider;
use Illuminate\Redis\Connections\PredisConnection;
use Illuminate\Support\Facades\Redis;
use Orchestra\Testbench\TestCase;

class ArrayRedisConnectionTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->app['config']->set('app.debug', true);
        $this->app['config']->set('database.redis.client', 'array');
        $this->app->register(ArrayRedisServiceProvider::class);
    }

    /** @test */
    public function it_mocks_redis_connection(): void
    {
        $connection = Redis::connection();

        $this->assertInstanceOf(PredisConnection::class, $connection);
        $this->assertInstanceOf('\M6Web\Component\RedisMock\RedisMock_Predis_Client_Adapter', $connection->client());
    }

    /** @test */
    public function redis_facade_works(): void
    {
        $value = 'test_value';
        $key = 'test_key';

        Redis::set($key, $value);

        $this->assertEquals($value, Redis::get($key));
    }
}