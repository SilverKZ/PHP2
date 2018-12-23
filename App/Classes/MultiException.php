<?php

namespace App\Classes;

/**
 * Class MultiException
 * @package App\Classes
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

