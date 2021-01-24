<?php

namespace Routing;

use Closure;

class Route {
  /**
   * The route action.
   *
   * @var string
   */
  protected Closure $handler;
  /**
   * The HTTP method the route responds to.
   *
   * @var string
   */
  protected string $method;
  /**
   * The URI the route responds to.
   *
   * @var string
   */
  protected string $path;
  /**
   * Create a new Route instance.
   *
   * @param string $method
   * @param string $path
   * @param Closure $handler
   * @return void
   */
  public function __construct(string $method, string $path, Closure $handler) {
    $this->handler = $handler;
    $this->method = $method;
    $this->path = $path;
  }
  /**
   * Run the route action.
   *
   * @param Routing\Request $request
   * @param Routing\Response $response
   * @return void
   */
  public function handle(Request $request, Response $response): void {
    call_user_func_array($this->handler, [$request, $response]);
  }
  /**
   * Get the HTTP method the route responds to.
   *
   * @return string
   */
  public function method(): string {
    return $this->method;
  }
  /**
   * Get the URI the route responds to.
   *
   * @return string
   */
  public function path(): string {
    return $this->path;
  }
}
