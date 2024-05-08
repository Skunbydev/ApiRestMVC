<?php

namespace App\Controller\Admin;

use \App\Utils\View;
use \App\Model\Entity\User;

class Login extends Page
{
  public static function getLogin($request, $errorMessage = null)
  {
    $status = !is_null($errorMessage) ? View::render('admin/login/status', [
      'mensagem' => $errorMessage,
    ]) : '';

    $content = View::render('admin/login', [
      'status' => $status,
    ]);
    return parent::getPage('Login > Skunby', $content);
  }
  public static function setLogin($request)
  {
    $postVars = $request->getPostVars();
    $email_usuario = $postVars['email_usuario'] ?? '';
    $senha_usuario = $postVars['$senha_usuario'] ?? '';

    $obUser = User::getUserByEmail($email_usuario);
    if (!$obUser instanceof User) {
      return self::getLogin($request, 'E-mail ou senhas inválidas');
    }
  }
}
?>