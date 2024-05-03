<?php
namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Error extends Page
{
  public static function getError()
  {
    $obOrganization = new Organization;
    return View::render('pages/erro', [
      'name' => $obOrganization->name,
      'description' => $obOrganization->description,
      'site' => $obOrganization->site,
    ]);
  }
}

?>