<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'articles';

    public $title;
    public $content;
    public $author_id;

    public static function findLast(int $limit = 3)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $limit;
        return $db->query($sql, [], static::class);
    }

    /*
    public function __get($name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
    }
    */
}

