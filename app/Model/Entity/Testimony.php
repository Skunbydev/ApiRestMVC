<?php
namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Testimony
{
  public $id;

  public $nome_usuario;

  public $mensagem_usuario;

  public $data_usuario;

  public function cadastrar()
  {
    date_default_timezone_set('America/Recife');
    $this->data_usuario = date('Y-m-d H:i:s'); // Formato corrigido
    $this->id = (new Database('depoimentos'))->insert([
      'nome_usuario' => $this->nome_usuario,
      'mensagem_usuario' => $this->mensagem_usuario,
      'data_usuario' => $this->data_usuario,
    ]);

    return true;
  }
  public static function getTestimonies($where = null, $order = null, $limit = null, $fields = '*')
  {
    return (new Database('depoimentos'))->select($where, $order, $limit, $fields);
  }
}

?>