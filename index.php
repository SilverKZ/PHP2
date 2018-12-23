<?php

require __DIR__ . '/autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = (!empty($params[1])) ? ucfirst($params[1]) : 'Index';

$controllerClass = '\App\Controllers\\' . $controllerName;

$actionName = (!empty($params[2])) ? strtolower($params[2]) : 'index';

try {

    $controller = new $controllerClass;
    $controller->action($actionName, $params);

} catch (\App\Classes\DBException $ex) {

    \App\Classes\Logger::save($ex);
    $controller = new \App\Controllers\Error;
    $controller->action('dataBase', $ex);

} catch (\App\Classes\BaseException $ex) {

    \App\Classes\Logger::save($ex);
    $controller = new \App\Controllers\Error;
    $controller->action('notFound', $ex);

}

