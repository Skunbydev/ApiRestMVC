<?php
namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class User
{
  public $id_usuario;

  public $nome_usuario;

  public $email_usuario;

  public $senha_usuario;

  public static function getUserByEmail($email_usuario)
  {
    return (new Database('usuarios'))->select('email_usuario = "' . $email_usuario . '"')->fetchObject(self::class);
  }
  public static function getUserByPassword($senha_usuario)
  {
    return (new Database('usuarios'))->select('senha_usuario = "' . $senha_usuario . '"')->fetchObject(self::class);
  }
}
?>