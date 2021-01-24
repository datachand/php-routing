<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Routing\Router;

$router->register('GET', '/', function ($request, $response) {
  if (!$request->cookie('been')) {
    $response->cookie("been", true);
    $response->body("Hello {$request->ip()}!")->send();
  }
  else {
    $response->body("Welcome back, {$request->ip()}!")->send();
  }
});

$router->dispatch();
