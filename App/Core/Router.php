<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    private string $basePath;

    public function __construct(string $basePath = '')
    {
        $this->basePath = '/' . trim($basePath, '/');
    }

    public function get(string $uri, array $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    protected function addRoute(string $method, string $uri, array $action)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => trim($uri, '/'),
            'action' => $action
        ];
    }

    public function dispatch()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove base path
        if ($this->basePath !== '/' && str_starts_with($requestUri, $this->basePath)) {
            $requestUri = substr($requestUri, strlen($this->basePath));
        }

        $requestUri = trim($requestUri, '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }

            // Convert /feedback/{id} to regex
            $pattern = preg_replace(
                '#\{([\w]+)\}#',
                '(?P<$1>[^/]+)',
                $route['uri']
            );

            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $requestUri, $matches)) {

                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }

                [$controller, $method] = $route['action'];

                $controller = "App\\Controller\\{$controller}";
                $instance = new $controller;

                return call_user_func_array(
                    [$instance, $method],
                    $params
                );
            }
        }

        http_response_code(404);
        require __DIR__ . '/../Views/errors/404.php';
    }
}
