<?php

namespace App\Http;

class Response
{
  /**
   * código do status
   * @var integer
   */

  private $httpCode = 200;
  private $headers = [];

  private $contentType = 'text/html';

  private $content;

  public function __construct($httpCode, $content, $contentType = 'text/html')
  {
    $this->httpCode = $httpCode;
    $this->content = $content;
    $this->contentType = $contentType;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function addHeader($key, $value)
  {
    $this->headers[$key] = $value;
  }
  public function getHttpCode()
  {
    $this->httpCode;
  }
  public function getContent()
  {
    $this->content;
  }
  public function getContentType()
  {
    $this->contentType;
  }
}
?>