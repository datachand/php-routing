<?php

namespace Routing;

use Closure;

class Router {
  /**
   * The array of registered routes.
   *
   * @var array
   */
  protected array $routes = [];
  /**
   * Dispath the request to the application.
   *
   * @return void
   */
  public function dispatch(): void {
    $request = new Request;
    $response = new Response;

    foreach ($this->routes as $route) {
      if ($request->method() == $route->method() && $request->path() == $route->path()) {
        $route->handle($request, $response);
        return;
      }
    }
    $response->onError(404);
  }
  /**
   * Register a new route with the router.
   *
   * @param string $method
   * @param string $path
   * @param Closure $handler
   * @return self
   */
  public function register(string $method, string $path, Closure $handler): self {
    array_push($this->routes, new Route($method, $path, $handler));
    return $this;
  }
}
