<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'articles';

    public $title;
    public $content;

    public static function findLast(int $length = 3)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $length;
        return $db->query($sql, [], static::class);
    }
}
