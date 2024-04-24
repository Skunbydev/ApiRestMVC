<?php
require __DIR__ . '/vendor/autoload.php';


use \App\Controller\Pages\Home;


$obRequest = new \App\Http\Response;
echo '<pre>';
print_r($obRequest);
echo '</pre>';
//echo Page::getPage();


echo Home::getHome();

?>