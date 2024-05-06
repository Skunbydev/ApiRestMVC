<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;
use \App\Model\Entity\Organization;

class Testimony extends Page
{
  private static function getTestimonyItens()
  {
    $itens = '';
    $results = EntityTestimony::getTestimonies(null, 'id DESC');
    if ($results->rowCount() == 0) {
      $itens = '<div class="card text-dark mb-3">
      <h5 class="card-header"></h5>
      <div class="card-body">
        nenhum depoimento encontrado...
      </div>
    </div>';
      return $itens;
    }

    while ($obTestimony = $results->fetchObject(EntityTestimony::class)) {
      $itens .= View::render('pages/testimony/item', [
        'nome_usuario' => $obTestimony->nome_usuario,
        'mensagem_usuario' => $obTestimony->mensagem_usuario,
        'data_usuario' => date('d/m/Y H:i:s', strtotime($obTestimony->data_usuario))
      ]);
    }
    return $itens;
  }
  public static function getTestimonies()
  {
    $obOrganization = new Organization;

    $content = View::render('pages/testimonies', [
      'itens' => self::getTestimonyItens()
    ]);
    return parent::getPage('Depoimentos > ', $content);
  }
  public static function insertTestimony($request)
  {
    $postVars = $request->getPostVars();
    $obTestimony = new EntityTestimony;
    $obTestimony->nome_usuario = $postVars['nome_usuario'];
    $obTestimony->mensagem_usuario = $postVars['mensagem_usuario'];
    echo "<script>alert('Depoimento enviado com sucesso')</script>";
    $obTestimony->cadastrar();
    return self::getTestimonies();
  }
}



?>