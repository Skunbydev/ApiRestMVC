<?php
require __DIR__ . '/vendor/autoload.php';


// use \App\Controller\Pages\Sobre;

use \App\Http\Router;
use \App\Utils\View;



define('URL', 'http://localhost/ApiRestMVC');

View::init([
  'URL' => URL
]);

$obRouter = new Router(URL);

include __DIR__ . '/routes/pages.php';


$obRouter
  ->run()
  ->sendResponse();



?>