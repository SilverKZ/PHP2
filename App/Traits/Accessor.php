<?php

namespace App\Traits;

/**
 * Перегрузка недоступных свойств
 *
 * Traits Accessor
 * @package App\Traits
 */
trait Accessor
{
    protected $data = [];

    /**
     * Выполняется при записи данных в недоступные свойства
     *
     * @param $name   Имя вызываемого свойства
     * @param $value  Значение, которое будет записано в свойство
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Выполняется при чтении данных из недоступных свойств
     *
     * @param $name  Имя вызываемого свойства
     * @return array | null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * Выполняется при использовании isset() или empty() на недоступных свойствах
     *
     * @param $name  Имя вызываемого свойства
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}

