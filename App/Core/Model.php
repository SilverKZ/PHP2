<?php

namespace App\Core;

/**
 * Class Model
 * @package App
 * @property int $id  ID экземпляра текущего класса
 */
abstract class Model
{
    protected const TABLE = '';

    public $id;

    /**
     * Возвращает массив всех записей в виде оъектов
     *
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    /**
     * Возвращает запись (объект) по ID
     *
     * @param int $id
     * @return object
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);
        return $res[0];
    }

    /**
     * Возвращает последние записи
     *
     * @param int $limit Количество последних записей
     * @return array Список записей (объекты)
     */
    public static function findLast(int $limit = 3)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, [], static::class);
    }

    /**
     * Удаляет запись (объект) по текущему ID
     *
     * @return bool
     */
    public function delete()
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }

    /**
     * Сохраняет новую запись (объект)
     *
     * @return bool
     */
    protected function insert()
    {
        $fields = get_object_vars($this);
        $columns = [];
        $values = [];
        $data = [];

        foreach ($fields as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $columns[] = $key;
            $values[] = ':' . $key;
            $data[':' . $key] = $value;
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', $values);
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . $columns . ') VALUES (' . $values . ')';

        $db = new Db();
        if (true == $db->execute($sql, $data)) {
            $this->id = $db->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Обновляет запись (объект) после изменений
     *
     * @return bool
     */
    protected function update()
    {
        $fields = get_object_vars($this);
        $sets = [];
        $data = [];

        foreach ($fields as $key => $value) {
            $data[':' . $key] = $value;
            if ('id' == $key) {
                continue;
            }
            $sets[] = $key . '=:' . $key;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $sets) . ' WHERE id=:id';
        $db = new Db();
        return $db->execute($sql, $data);
    }

    /**
     * Вызывает соответствующий метод в зависимости от наличия ID
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * Заполняет свойства модели данными из массива, валидируя их
     *
     * @param array $data
     */
    public function fill(array $data): void
    {
        $errors = new MultiException();

        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if (empty($data[$key])) {
                    $errors->add(new \Exception('Не заполнено поле: ' . $key, 42));
                }
                $this->$key = $data[$key];
            }
        }

        if (!$errors->empty()) {
            throw $errors;
        }
    }
}

