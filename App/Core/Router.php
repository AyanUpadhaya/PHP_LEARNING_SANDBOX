<?php

namespace App\Core;

class Router
{
    private string $basePath;
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(string $basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    public function get(string $uri, string $action): void
    {
        $this->routes['GET'][$this->normalize($uri)] = $action;
    }

    public function post(string $uri, string $action): void
    {
        $this->routes['POST'][$this->normalize($uri)] = $action;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->getCurrentUri();

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Page Not Found";
            return;
        }

        [$controller, $methodName] =
            explode('@', $this->routes[$method][$uri]);

        $controllerClass = "App\\Controller\\$controller";
        $controllerInstance = new $controllerClass();

        call_user_func([$controllerInstance, $methodName]);
    }

    private function getCurrentUri(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // remove base path
        if ($this->basePath && str_starts_with($uri, $this->basePath)) {
            $uri = substr($uri, strlen($this->basePath));
        }

        return $this->normalize($uri);
    }

    private function normalize(string $uri): string
    {
        return '/' . trim($uri, '/');
    }
}
