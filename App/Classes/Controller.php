<?php

namespace App\Classes;

abstract class Controller
{
    protected $view;
    protected $params = [];

    public function __construct()
    {
        $this->view = new View();
    }

    public function action(string $action, $params)
    {
        $this->params = $params;

        if ($this->access()) {
            $this->$action();
        } else {
            throw new BaseException('Доступ закрыт');
        }
    }

    public function __call($name, $arguments)
    {
        throw new BaseException('Ошибка 404 - не найдено', 42);
    }

    protected function access(): bool
    {
        return true;
    }

    protected function redirect(string $path)
    {
        header('Location: ' . $path);
        exit;
    }
}

