<?php

namespace App\Http;

use \Closure;
use \Exception;

class Router
{
  private $url = '';
  private $prefix = '';

  private $routes = [];

  private $request;

  public function __construct($url)
  {
    $this->request = new Request();
    $this->url = $url;
    $this->setPrefix();
  }

  private function setPrefix()
  {
    $parseUrl = parse_url($this->url);
    $this->prefix = $parseUrl['path'] ?: '';
  }
  private function addRoute($method, $route, $params = [])
  {
    foreach ($params as $key => $value) {
      if ($value instanceof Closure) {
        $params['controller'] = $value;
        unset($params[$key]);
        continue;
      }
    }

    $patternRoute = '/^' . str_replace('/', '\/', $route) . '$/';
    $this->routes[$patternRoute][$method] = $params;


  }
  public function get($route, $params = [])
  {
    return $this->addRoute('GET', $route, $params);
  }
  public function POST($route, $params = [])
  {
    return $this->addRoute('POST', $route, $params);
  }
  public function PUT($route, $params = [])
  {
    return $this->addRoute('PUT', $route, $params);
  }
  public function DELETE($route, $params = [])
  {
    return $this->addRoute('DELETE', $route, $params);
  }

  private function getUri()
  {
    $uri = $this->request->getUri();
    $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

    return end($xUri);
  }

  private function getRoute()
  {
    $uri = $this->getUri();
    $httpMethod = $this->request->getHttpMethod();

    foreach ($this->routes as $patternRoute => $methods) {
      if (preg_match($patternRoute, $uri)) {
        if ($methods[$httpMethod]) {
          return $methods[$httpMethod];
        }
        throw new Exception("Metódo não é permitido", 405);
      }
    }
    throw new Exception("URL não encontrada", 404);
  }

  public function run()
  {
    try {
      $route = $this->getRoute();
      echo '<pre>';
      print_r($route);
      echo '</pre>';
      exit;
    } catch (Exception $e) {
      return new Response($e->getCode(), $e->getMessage());
    }
  }
}

?>