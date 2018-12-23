<?php

require __DIR__ . '/../autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = (!empty($params[2])) ? ucfirst($params[2]) : 'Index';

$controllerClass = '\App\Controllers\Admin\\' . $controllerName;

$actionName = (!empty($params[3])) ? strtolower($params[3]) : 'index';

try {

    $controller = new $controllerClass;
    $controller->action($actionName, $params);

} catch (\App\Classes\MultiException $ex) {

    $controller = new \App\Controllers\Error;
    $controller->action('validate', $ex);

} catch (\App\Classes\DBException $ex) {

    \App\Classes\Logger::save($ex);
    $controller = new \App\Controllers\Error;
    $controller->action('dataBase', $ex);

} catch (\App\Classes\BaseException $ex) {

    \App\Classes\Logger::save($ex);
    $controller = new \App\Controllers\Error;
    $controller->action('notFound', $ex);

}

