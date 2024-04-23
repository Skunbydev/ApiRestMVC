<?php

namespace App\Utils;

class View
{
  private static function getContentView($view)
  {
    $file = __DIR__ . '/../../resources/view/' . $view . '.html';
    return file_exists($file) ? file_get_contents($file) : '';
  }
  /** 
  @param string $view
  @return string
  */
  public static function render($view)
  {
    $contentView = self::getContentView($view);
    return $contentView;
  }
}

?>