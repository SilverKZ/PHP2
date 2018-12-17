<?php

namespace App\Models;

use App\Classes\Model;

/**
 * Class Author
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 */
class Author extends Model
{
    protected const TABLE = 'authors';

    public $name;
}

