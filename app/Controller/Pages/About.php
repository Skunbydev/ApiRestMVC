<?php
namespace App\Controller\Pages;


use \App\Utils\View;
use \App\Model\Entity\Organization;


class About extends Page
{

  public static function getHome()
  {
    $obOrganization = new Organization;
    $content = View::render('pages/about', [
      'name' => $obOrganization->name,
      'description' => $obOrganization->description,
      'site' => $obOrganization->site,
    ]);
    return parent::getPage('SOBRE - SKUNBY', $content);
  }

}

?>