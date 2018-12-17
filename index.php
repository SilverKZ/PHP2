<?php

require __DIR__ . '/autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = (!empty($params[1])) ? ucfirst($params[1]) : 'Index';

$controllerClass = '\App\Controllers\\' . $controllerName;

$controller = new $controllerClass;

$actionName = (!empty($params[2])) ? strtolower($params[2]) : 'index';

$controller->action($actionName, $params);

