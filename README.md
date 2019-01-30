# Laravel Redis Fake
A laravel wrapper for [M6Web/RedisMock](https://github.com/M6Web/RedisMock). You can mock your Redis in your tests without a running redis server.

<p align="center">
<a href="https://travis-ci.org/aragorn-yang/laravel-array-redis"><img src="https://travis-ci.org/aragorn-yang/laravel-array-redis.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/aragorn-yang/laravel-array-redis"><img src="https://poser.pugx.org/aragorn-yang/laravel-array-redis/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/aragorn-yang/laravel-array-redis"><img src="https://poser.pugx.org/aragorn-yang/laravel-array-redis/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/aragorn-yang/laravel-array-redis"><img src="https://poser.pugx.org/aragorn-yang/laravel-array-redis/license.svg" alt="License"></a>
</p>

## Installation & Usage

Use Composer to add this package to your project's dev-dependencies:
```bash
composer require --dev aragorn-yang/laravel-array-redis
```

In `config/database.php`, make the Redis client configurable via environment variable:
```php
'redis' => [
    'client' => env('REDIS_CLIENT', 'predis'),
],
```

Now, you can switch to the `mock` client via environment setting.
1. You can set it in your `.env.testing`:
```
REDIS_CLIENT=array
```
2. Alternatively, you can do it in your `phpunit.xml`:
```
<env name="REDIS_CLIENT" value="array"/>
```