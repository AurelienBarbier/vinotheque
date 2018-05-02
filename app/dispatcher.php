<?php
/**
 * This file handle routes dispatching.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */


// STEP 1 quelles uri sont dipo ?
require_once __DIR__ . '/routing.php';
$routesCollection = function (FastRoute\RouteCollector $r) use ($routes) {
    foreach ($routes as $controller => $actions) {
        foreach ($actions as $action) {
            $r->addRoute($action[2], $action[1], $controller . '/' . $action[0]);
        }
    }
};
$dispatcher = FastRoute\simpleDispatcher($routesCollection);

// STEP 2 Quelles est l'uri demandée
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

var_dump($httpMethod);
var_dump($uri);

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


// STEP 3 Est ce que ca concorde ?
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        header("HTTP/1.0 404 Not Found");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        $class = APP_CONTROLLER_NAMESPACE . $class . APP_CONTROLLER_SUFFIX;
        echo call_user_func_array([new $class(), $method], $vars);
        break;
}
