<?php
require __DIR__ . '/vendor/autoload.php';


//use \App\Controller\Pages\Home;
use App\Controller\Pages\Home;
use \App\Http\Router;
use \App\Http\Response;

define('URL', 'http://localhost/ApiRestMVC');

$obRouter = new Router(URL);

$obRouter->get('/', [
  function () {
    return new Response(200, Home::getHome());
  }
]);

$obRouter
  ->run()
  ->sendResponse();



?>