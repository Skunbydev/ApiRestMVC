<?php
require __DIR__ . '/vendor/autoload.php';


use \App\Controller\Pages\Home;


$obResponse = new \App\Http\Response(200, 'Sucesso');
$obResponse->sendResponse();
//echo Page::getPage();

exit;
echo Home::getHome();

?>