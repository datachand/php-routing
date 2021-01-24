<?php

namespace Routing;

class Request {
  /**
   * The array of cookies.
   *
   * @var array
   */
  protected array $cookies;
  /**
   * The array of form data.
   *
   * @var array
   */
  protected array $data;
  /**
   * The array of HTTP request headers.
   *
   * @var array
   */
  protected array $headers;
  /**
   * The IP address of a user.
   *
   * @var string
   */
  protected string $ip;
  /**
   * The HTTP request method.
   *
   * @param string $method
   */
  protected string $method;
  /**
   * The HTTP request URI.
   *
   * @param string $path
   */
  protected string $path;
  /**
   * The name and version of the information protocol.
   *
   * @var string
   */
  protected string $protocol;
  /**
   * Create a new Request instance.
   *
   * @return void
   */
  public function __construct() {
    $this->cookies = $_COOKIE;
    $this->data = $_POST;
    $this->headers = apache_request_headers();
    $this->ip = $_SERVER['REMOTE_ADDR'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->path = $_SERVER['REQUEST_URI'];
    $this->protocol = $_SERVER['SERVER_PROTOCOL'];
  }
  /**
   * Get a cookie value by its name.
   *
   * @param string $name
   * @return null|string
   */
  public function cookie(string $name): ?string {
    if (isset($this->cookies[$name])) {
      return $this->cookies[$name];
    }
    return null;
  }
  /**
   * Get a form datum by its name.
   *
   * @param string $name
   * @return null|string
   */
  public function data(string $name): ?string {
    if (isset($this->data[$name])) {
      return $this->data[$name];
    }
    return null;
  }
  /**
   * Get a header value by its name.
   *
   * @param string $name
   * @return null|string
   */
  public function header(string $name): ?string {
    if (isset($this->headers[$name])) {
      return $this->headers[$name];
    }
    return null;
  }
  /**
   * Get the IP address.
   *
   * @return string
   */
  public function ip(): string {
    return $this->ip;
  }
  /**
   * Get the request method.
   *
   * @return string
   */
  public function method(): string {
    return $this->method;
  }
  /**
   * Get the request URI.
   *
   * @return string
   */
  public function path(): string {
    return $this->path;
  }
  /**
   * Get the name and version of the protocol.
   *
   * @return string
   */
  public function protocol(): string {
    return $this->protocol;
  }
}
