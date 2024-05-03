<?php

use App\Controller\Pages;
use \App\Http\Response;


$obRouter->get('/', [
  function () {
    return new Response(200, Pages\Home::getHome());
  }
]);

$obRouter->get('/sobre', [
  function () {
    return new Response(200, Pages\About::getAbout());
  }
]);

$obRouter->get('/pagina/{idPagina}/{acao}', [
  function ($idPagina, $acao) {
    return new Response(200, 'Pagina ' . $idPagina . '-' . $acao);
  }
]);


// $obRouter->get('pagina/')

// $obRouter->get('/pagina/error404', [
//   function () {
//     return new Response(200, Pages\Error::getError());
//   }
// ]);
?>