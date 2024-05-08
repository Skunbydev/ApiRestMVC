<?php
namespace App\Controller\Admin;

use \App\Utils\View;

class Page
{
  public static function getPage($tittle, $content)
  {
    return View::render('admin/page', [
      'tittle' => $tittle,
      'content' => $content,
    ]);
  }
}
?>