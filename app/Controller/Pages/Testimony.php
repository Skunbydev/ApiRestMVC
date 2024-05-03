<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;
use \App\Model\Entity\Organization;

class Testimony extends Page
{
  public static function getTestimonies()
  {
    $obOrganization = new Organization;

    $content = View::render('pages/testimonies', [

    ]);
    return parent::getPage('Depoimentos > ', $content);
  }
  public static function insertTestimony($request)
  {
    $postVars = $request->getPostVars();
    $obTestimony = new EntityTestimony;
    $obTestimony->nome_usuario = $postVars['nome_usuario'];
    $obTestimony->mensagem_usuario = $postVars['mensagem_usuario'];
    //$obTestimony->data = $postVars['data_usuario'];
    $obTestimony->cadastrar();
    return self::getTestimonies();
  }
}



?>