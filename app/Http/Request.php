<?php
namespace App\Http;

class Request
{

  /** metódo da requisição
   * @var string
   */
  private $httpMethod;

  /**  
   * Uri da página
   * @var string
   */
  private $uri;

  /**
   * Parâmetros da URL ($_GET)
   * @var array
   */
  private $queryParams = [];
  /**
   * Variáveis recebidas no POST da página ($_POST)
   * @var array
   */

  private $postVars = [];

  private $headers = [];

  public function __construct()
  {
    $this->queryParams = $_GET ?? [];
    $this->postVars = $_POST ?? [];
    $this->headers = getallheaders() ?? [];
    $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
    $this->uri = $_SERVER['REQUEST_URI'] ?? '';
  }
  public function getHttpMethod()
  {
    return $this->httpMethod;

  }
  public function getUri()
  {
    return $this->uri;

  }
  public function getQueryParams()
  {
    return $this->queryParams;
  }
  public function getPostVars()
  {
    return $this->postVars;

  }
  public function getHeaders()
  {
    return $this->headers;
  }
}

?>