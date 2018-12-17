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

    public function action(string $action, array $params)
    {
        $this->params = $params;
        ($this->access()) ? $this->$action() : die('Доступ закрыт');
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

