<?php

namespace App\Models;

use App\Core\Db;
use App\Core\Model;

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
     * Вызывается при обращении к свойству 'author'
     *
     * @param string $name Свойство 'author' текущего объекта
     * @return Author|null Объект класса Author
     */
    public function __get($name)
    {
       if ('author' == $name && !empty($this->author_id)) {
           return Author::findById($this->author_id);
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

