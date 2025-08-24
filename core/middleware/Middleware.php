<?php

namespace core\middleware;

use Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    /**
     * @throws Exception
     */
    public static function resolve($key): void
    {
        if (! $key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new Exception('Middleware not found');
        }

        (new $middleware)->handle();
    }
}