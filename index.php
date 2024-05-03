<?php
require __DIR__ . '/vendor/autoload.php';


// use \App\Controller\Pages\Sobre;

use \App\Http\Router;
use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;

Environment::load(__DIR__);

define('URL', getenv('URL'));

View::init([
  'URL' => URL
]);

$obRouter = new Router(URL);

include __DIR__ . '/routes/pages.php';


$obRouter
  ->run()
  ->sendResponse();



?>