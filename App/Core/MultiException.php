<?php

namespace App\Core;

/**
 * Class MultiException
 * @package App\Core
 */
class MultiException extends \Exception
{
    protected $errors;

    public function add(\Exception $exception)
    {
        $this->errors[] = $exception;
    }

    public function empty(): bool
    {
        return empty($this->errors);
    }

    public function all()
    {
        return $this->errors;
    }
}

