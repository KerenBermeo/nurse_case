<?php
class Router {
    private array $routes = [];

    public function get(string $route, callable|array $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post(string $route, callable|array $action) {
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch(string $uri, string $method) {
        $uri = parse_url($uri, PHP_URL_PATH); // Limpia la URL

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];

            if (is_array($action)) {
                [$controller, $method] = $action;
                require_once __DIR__ . "/../app/controllers/{$controller}.php";
                $instance = new $controller();
                return $instance->$method();
            } else {
                return call_user_func($action);
            }
        }

        http_response_code(404);
        echo "404 - Página no encontrada";
    }
}
?>

