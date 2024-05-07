<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Testimony as EntityTestimony;
use \WilliamCosta\DatabaseManager\Pagination;


class Testimony extends Page
{
  private static function getTestimonyItens($request, &$obPagination)
  {
    $itens = '';
    $quantidade_total = EntityTestimony::getTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
    $queryParams = $request->getQueryParams();
    $paginaAtual = $queryParams['page'] ?? 1;

    $obPagination = new Pagination($quantidade_total, $paginaAtual, 3);
    $results = EntityTestimony::getTestimonies(null, 'id DESC', $obPagination->getLimit());
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
  public static function getTestimonies($request)
  {
    $content = View::render('pages/testimonies', [
      'itens' => self::getTestimonyItens($request, $obPagination),
      'pagination' => self::getPagination($request, $obPagination),
    ]);
    return parent::getPage('Depoimentos', $content);
  }
  public static function insertTestimony($request)
  {
    $postVars = $request->getPostVars();
    $obTestimony = new EntityTestimony;
    $obTestimony->nome_usuario = $postVars['nome_usuario'];
    $obTestimony->mensagem_usuario = $postVars['mensagem_usuario'];

    echo "<script>alert('Depoimento enviado com sucesso');</script>";

    $obTestimony->cadastrar();
    return self::getTestimonies($request);
  }
}



?>