<?php

namespace App\Controller\Admin;

use \App\Utils\View;
use \App\Model\Entity\User;
use \App\Session\Admin\Login as SessionAdminLogin;

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
    $senha_usuario = $postVars['senha_usuario'] ?? '';

    $obUser = User::getUserByEmail($email_usuario);
    if (!$obUser instanceof User) {
      return self::getLogin($request, 'Usuário e/ou senha inválidos');
    }
    if (!password_verify($senha_usuario, $obUser->senha_usuario)) {
      return self::getLogin($request, 's e/ou senha inválidos');
    }
    SessionAdminLogin::login($obUser);
    $request->getRouter()->redirect('/admin');
    return true;
  }

  public static function setLogout($request)
  {
    SessionAdminLogin::logout();
    $request->getRouter()->redirect('/admin/login');
  }
}
?>