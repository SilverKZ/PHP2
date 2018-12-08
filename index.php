<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View();

$view->articles = Article::findLast(3);

$view->display(__DIR__ . '/App/Views/index.php');

