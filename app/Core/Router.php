<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    private array $routes = [];

    public function add(string $method, string $path, mixed $handler, array $middleware = []): void
    {
        $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '(?P<$1>[^/]+)', $path);
        $pattern = '#^' . rtrim($pattern, '/') . '/?$#';
        $this->routes[] = [
            'method' => strtoupper($method),
            'pattern' => $pattern,
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $decodedPath = rawurldecode($path);
        $basePath = rtrim((require BASE_PATH . '/config/app.php')['base_path'], '/');
        $decodedBasePath = rawurldecode($basePath);
        if ($decodedBasePath !== '' && str_starts_with($decodedPath, $decodedBasePath)) {
            $decodedPath = substr($decodedPath, strlen($decodedBasePath)) ?: '/';
        }
        $path = $decodedPath;

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            if (!preg_match($route['pattern'], $path, $matches)) {
                continue;
            }

            foreach ($route['middleware'] as $guard) {
                Auth::requireRole((array) $guard);
            }

            $params = array_filter($matches, static fn($k) => !is_int($k), ARRAY_FILTER_USE_KEY);
            $this->invoke($route['handler'], $params);
            return;
        }

        http_response_code(404);
        echo '404 Not Found';
    }

    private function invoke(mixed $handler, array $params): void
    {
        if (is_callable($handler)) {
            $handler($params);
            return;
        }

        if (is_array($handler) && count($handler) === 2) {
            [$class, $method] = $handler;
            (new $class())->{$method}($params);
            return;
        }

        throw new \RuntimeException('Invalid route handler.');
    }
}
