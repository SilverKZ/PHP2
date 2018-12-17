<?php

require __DIR__ . '/../autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = (!empty($params[2])) ? ucfirst($params[2]) : 'Index';

$controllerClass = '\App\Controllers\Admin\\' . $controllerName;

$controller = new $controllerClass;

$actionName = (!empty($params[3])) ? strtolower($params[3]) : 'index';

$controller->action($actionName, $params);

