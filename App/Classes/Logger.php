<?php

namespace App\Classes;

class Logger
{
    protected static $logsFile = __DIR__ . '/../logger.dat';

    public static function save(\Exception $error)
    {
        $info = date('Y-m-d H:i:s');
        $info .= ' Файл: ' . $error->getFile();
        $info .= ' Строка: ' . $error->getLine();
        $info .= ' Описание: ' . $error->getMessage();
        $info .= ' Код: ' . $error->getCode();

        file_put_contents(self::$logsFile, PHP_EOL . $info, FILE_APPEND);
    }
}

