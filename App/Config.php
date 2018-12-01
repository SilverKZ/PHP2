<?php

namespace App;

class Config
{
    public $data = [];

    protected static $instance;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new Config();
        }
        return self::$instance;
    }
}

/* Этот вариант больше нравится, т.к. вообще не требует создание объекта Config
class Config
{
    protected static $data = [];

    public static function getData()
    {
        if (null == self::$data) {
            self::$data = include __DIR__ . '/../config.php';
        }
        return self::$data;
    }
}
*/