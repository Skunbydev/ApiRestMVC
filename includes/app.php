<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \WilliamCosta\DatabaseManager\Database;

Environment::load(__DIR__ . '/../');


foreach ($_ENV as $key => $value) {
  echo "$key=$value" . PHP_EOL;
}
Database::config(
  getEnv('DB_HOST'),
  getEnv('DB_NAME'),
  getEnv('DB_USER'),
  getEnv('DB_PASS'),
  getEnv('DB_PORT')
);
define('URL', getEnv('URL'));

View::init([
  'URL' => URL
]);
?>