<?php
namespace App\Http;

class Request
{
  private $router;
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

  public function __construct($router)
  {
    $this->router = $router;
    $this->queryParams = $_GET ?? [];
    $this->postVars = $_POST ?? [];
    $this->headers = getallheaders() ?? [];
    $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
    $this->setUri();
  }
  private function setUri()
  {
    $this->uri = $_SERVER['REQUEST_URI'] ?? '';

    $xURI = explode('?', $this->uri);
    $this->uri = $xURI[0];
  }

  public function getRouter()
  {
    return $this->router;
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