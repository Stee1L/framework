<?php

namespace Src;


use Error;

use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use FastRoute\DataGenerator\MarkBased;
use FastRoute\Dispatcher\MarkBased as Dispatcher;
use Src\Traits\SingletonTrait;

class Route
{
    //Используем методы трейта
    use SingletonTrait;

    //Свойство для хранения текущего маршрута
    private string $currentRoute = '';
    private $currentHttpMethod;

    //Свойство для префикса для всех маршрутов
    private string $prefix = '';

    //Классы для использования внешнего маршрутизатора
    private RouteCollector $routeCollector;

    //Добавляет маршрут, устанавливает его текущим и возвращает объект
    public static function add($httpMethod, string $route, array $action): self
    {
        self::single()->routeCollector->addRoute($httpMethod, $route, $action);
        self::single()->currentHttpMethod = $httpMethod;
        self::single()->currentRoute = $route;
        return self::single();
    }

    //Добавляет префикс для обозначенных маршрутов
    public static function group(string $prefix, callable $callback): void
    {
        self::single()->routeCollector->addGroup($prefix, $callback);
        Middleware::single()->group($prefix, $callback);
    }

    //Конструктор скрыт. Вызывается только один раз
    private function __construct()
    {
        $this->routeCollector = new RouteCollector(new Std(), new MarkBased());
    }

    public function setPrefix(string $value = ''): self
    {
        $this->prefix = $value;
        return $this;
    }

    public function redirect(string $url): void
    {
        header('Location: ' . $this->getUrl($url));
    }

    public function getUrl(string $url): string
    {
        return $this->prefix . $url;
    }

    //Добавление middlewares для текущего маршрута
    public function middleware(...$middlewares): self
    {
        Middleware::single()->add($this->currentHttpMethod, $this->currentRoute, $middlewares);
        return $this;
    }

    public function start(): void
    {
        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $uri = substr($uri, strlen($this->prefix));

        $dispatcher = new Dispatcher($this->routeCollector->getData());

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                throw new Error('NOT_FOUND');
            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new Error('METHOD_NOT_ALLOWED');
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = array_values($routeInfo[2]);
//Вызываем обработку всех Middleware
                $vars[] = Middleware::single()->go($httpMethod, $uri, new Request());
                $class = $handler[0];
                $action = $handler[1];
                call_user_func([new $class, $action], ...$vars);
                break;
        }
    }


}


/*
class Route
{
    private static array $routes = [];
    private static string $prefix = '';

    public static function setPrefix($value)
    {
        self::$prefix = $value;
    }

    public static function add(string $route, array $action): void
    {
        if (!array_key_exists($route, self::$routes)) {
            self::$routes[$route] = $action;
        }
    }

    public function start(): void
    {
        $path = explode('?', $_SERVER['REQUEST_URI'])[0];
        $path = substr($path, strlen(self::$prefix) + 1);

        if (!array_key_exists($path, self::$routes)) {
            throw new Error('This path does not exist');
        }

        $class = self::$routes[$path][0];
        $action = self::$routes[$path][1];

        if (!class_exists($class)) {
            throw new Error('This class does not exist');
        }

        if (!method_exists($class, $action)) {
            throw new Error('This method does not exist');
        }
        call_user_func([new $class, $action], new Request());

        //call_user_func([new $class, $action]);
    }

    public function redirect(string $url): void
    {
        header('Location: ' . $this->getUrl($url));
    }

    public function getUrl(string $url): string
    {
        return self::$prefix . $url;
    }

    public function __construct(string $prefix = '')
    {
        self::setPrefix($prefix);
    }

}*/
