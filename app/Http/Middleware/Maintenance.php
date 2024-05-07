<?php
namespace App\Http\Middleware;

class Maintenance
{
  public function handle($request, $next)
  {
    echo '<pre>';
    print_r($request);
    echo '</pre>';
    exit();
  }
}
?>