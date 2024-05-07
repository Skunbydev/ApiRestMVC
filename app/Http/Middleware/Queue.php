<?php

namespace App\Http\Middleware;

use PhpParser\Node\Expr\Print_;

class Queue
{
  private static $map = [];
  private $middlewares = [];

  private $controller;

  private $controllerArgs = [];

  public function __construct($middlewares, $controller, $controllerArgs)
  {
    $this->middlewares = $middlewares;
    $this->controller = $controller;
    $this->controllerArgs = $controllerArgs;
  }
  public static function setMap($map)
  {
    self::$map = $map;
  }
  public function next($request)
  {
    if (empty($this->middlewares))
      return call_user_func_array($this->controller, $this->controllerArgs);

    $middleware = array_shift($this->middlewares);

    if (!isset(self::$map[$middleware])) {
      throw new \Exception("Problemas ao procesar o middleware da requisição", 500);
    }
    $queue = $this;
    $next = function ($request) use ($queue) {
      return $queue->next($request);
    };
  }
}
?>