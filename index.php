<?php
ob_start();

require __DIR__."/vendor/autoload.php";

/**
 *  BOOTSTRAP
 */
use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();

$router = new Router(url(), ":"); // Defining url base and separator for routers.

/**
 *  WEB ROUTES
 */
$router->namespace("Source\App"); // Controllers namespace.
$router->get("/", "Web:home");
$router->get("/sobre", "Web:about");
$router->get("/termos", "Web:terms");

/**
 *  ERROR ROUTES
 */
$router->namespace("Source\App")->group("/ops"); // Creating a group of routes.
$router->get("/{errcode}", "Web:error");

/**
 *  ROUTES
 */
$router->dispatch();

/**
 *  ERROR REDIRECT
 */
if($router->error()){
    $router->redirect("/ops/{$router->error()}"); // Redirecting for error code.
}

ob_end_flush();