<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articles = Article::findLast(3);

include __DIR__ . '/App/Views/index.php';

