<?php

namespace App\Core;

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
            self::$instance = new self;
        }
        return self::$instance;
    }
}

