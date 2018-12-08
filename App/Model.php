<?php

namespace App;

abstract class Model
{
    protected const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id], static::class);
        return (empty($res)) ? false : $res[0];
    }

    public function delete()
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }

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

    public function save()
    {
        (isset($this->id)) ? $this->update() : $this->insert();
    }
}

