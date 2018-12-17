<?php

namespace App\Classes;

class Config
{
    public $data = [];

    protected static $instance;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config1.php';
    }

    public static function instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}

