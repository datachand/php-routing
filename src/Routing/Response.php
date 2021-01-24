<?php

namespace Routing;

class Response {
  /**
   * The response body.
   *
   * @var string
   */
  protected string $body;
  /**
   * Cookie files to set up.
   *
   * @var array
   */
  protected array $cookies = [];
  /**
   * The response headers.
   *
   * @var array
   */
  protected array $headers = [];
  /**
   * The response status code.
   *
   * @var int
   */
  protected int $statusCode = 200;
  /**
   * Send an error response.
   *
   * @param int $statusCode
   * @return void
   */
  public function onError(int $statusCode): void {
    $this->statusCode($statusCode);
    $this->body("Error {$statusCode}");
    $this->send();
  }
  /**
   * Send the response.
   *
   * @return void
   */
  public function send(): void {
    http_response_code($this->statusCode);
    foreach ($this->headers as $name => $value) {
      header("{$name}: {$value}");
    }
    foreach ($this->cookies as $cookie) {
      header("Set-Cookie: {$cookie}");
    }
    echo $this->body;
    exit;
  }
  /**
   * Set a response body.
   *
   * @param string $body
   * @return void
   */
  public function body(string $body): self {
    $this->body = $body;
    return $this;
  }
  /**
   * Set a new cookie file.
   *
   * @param string $name
   * @param string $value
   * @return self
   */
  public function cookie(string $name, string $value): self {
    $cookie = "{$name}={$value}";
    array_push($this->cookies, $cookie);
    return $this;
  }
  /**
   * Set a response header.
   *
   * @param string $name
   * @param string $value
   * @return self
   */
  public function header(string $name, string $value): self {
    $this->headers[$name] = $value;
    return $this;
  }
  /**
   * Set a response status code.
   *
   * @param int $statusCode
   * @return self
   */
  public function statusCode(int $statusCode): self {
    $this->statusCode = $statusCode;
    return $this;
  }
}
