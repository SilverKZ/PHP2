<?php

namespace App\Core;

use Psr\Log\AbstractLogger;

/**
 * Class Logger
 * @package App\Core
 */
class Logger extends AbstractLogger
{
    protected $logsFile = __DIR__ . '/../logger.dat';

    protected $exception;

    public function __construct(\Exception $ex)
    {
        $this->exception = $ex;
    }

    public function log($level, $message, array $context = [])
    {
        $message = date('Y-m-d H:i:s');
        $message .= ' Файл: ' .  $this->exception->getFile();
        $message .= ' Строка: ' .  $this->exception->getLine();
        $message .= ' Описание: ' .  $this->exception->getMessage();
        $message .= ' Код: ' .  $this->exception->getCode();

        file_put_contents($this->logsFile, $message . PHP_EOL, FILE_APPEND);
    }
}

