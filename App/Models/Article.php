<?php

namespace App\Models;

use App\Classes\Db;
use App\Classes\Model;

/**
 * Class Article
 *
 * @package App\Models
 *
 * @property int    $id        ID статьи (экземпляр текущего класса)
 * @property string $title     Заголовок статьи (новости)
 * @property string $content   Содержание статьи (новости)
 * @property int    $author_id ID автора статьи (экземпляра класса Author)
 * @property Author $author    Автор статьи (экземпляр класса Author)
 */
class Article extends Model
{
    protected const TABLE = 'articles';

    public $title;
    public $content;
    public $author_id;

    /**
     * Возвращает последние новости
     *
     * @param int $limit Количество последних новостей
     * @return array Список новостей (объекты)
     */
    public static function findLast(int $limit = 3)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, [], static::class);
    }

    /**
     * Вызывается при обращении к свойству 'author'
     *
     * @param string $name Свойство 'author' текущего объекта
     * @return Author|null Объект класса Author
     */
    public function __get($name)
    {
       if ('author' == $name && !empty($this->author_id)) {
           return $this->author = Author::findById($this->author_id);
       }
       return null;
    }

    /**
     * Вызывается при проверке свойства 'author'
     *
     * @param string $name Свойство 'author' текущего объекта
     * @return bool
     */
    public function __isset($name)
    {
        return ('author' == $name) ? !empty($this->author_id) : false;
    }
}

