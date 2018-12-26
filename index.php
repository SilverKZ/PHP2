<?php

require __DIR__ . '/autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = (!empty($params[1])) ? ucfirst($params[1]) : 'Index';

$controllerClass = '\App\Controllers\\' . $controllerName;

$actionName = (!empty($params[2])) ? strtolower($params[2]) : 'index';

try {

    if (!is_readable(__DIR__ . '\\' . str_replace('\\', '/', $controllerClass) . '.php')) {
        throw new \App\Core\BaseException('Ошибка 404 - не найдено', 42);
    }

    $controller = new $controllerClass;
    $controller->action($actionName, $params);

} catch (\App\Core\DBException $ex) {

    (new \App\Core\Logger($ex))->error('Logger');

    $controller = new \App\Controllers\Error;
    $controller->action('dataBase', $ex);

} catch (\App\Core\BaseException $ex) {

    (new \App\Core\Logger($ex))->error('Logger');

    $controller = new \App\Controllers\Error;
    $controller->action('notFound', $ex);

}

