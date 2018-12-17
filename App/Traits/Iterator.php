<?php

namespace App\Traits;

/**
 * Реализация интерфейса Iterator
 *
 * Traits Iterator
 * @package App
 */
trait Iterator
{
    protected $data = [];

    /**
     * Устанавливает указатель итератора на первый элемент
     *
     * @return mixed
     */
    public function rewind()
    {
        return reset($this->data);
    }

    /**
     * Возвращает текущий элемент итератора
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Возвращает ключ текущего элемента итератора
     *
     * @return int|null|string
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Перемещает указатель итератора вперед на один элемент
     *
     * @return mixed
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * Проверяет корректность текущей позиции итератора
     *
     * @return bool
     */
    public function valid(): bool
    {
        return null !== key($this->data);
    }
}

