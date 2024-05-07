<?php
namespace App\Controller\Pages;


use \App\Utils\View;

class Page
{
  private static function getHeader()
  {
    return View::render('pages/header');
  }
  private static function getFooter()
  {
    return View::render('pages/footer');
  }
  public static function getPagination($request, $obPagination)
  {
    $pages = $obPagination->getPages();
    if (count($pages) <= 1)
      return '';
    $links = '';

    $url = $request->getRouter()->getCurrentUrl();

    $queryParams = $request->getQueryParams();

    foreach ($pages as $page) {
      $queryParams['page'] = $page['page'];

      $link = $url . '?' . http_build_query($queryParams);

      $links .= View::render('pages/pagination/link', [
        'page' => $page['page'],
        'link' => $link,
        'active' => $page['current'] ? 'active' : '',
      ]);
    }
    return View::render('pages/pagination/box', [
      'links' => $links
    ]);
  }

  public static function getPage($title, $content)
  {
    return View::render('pages/page', [
      'tittle' => $title,
      'header' => self::getHeader(),
      'content' => $content,
      'footer' => self::getFooter(),

    ]);
  }

}

?>