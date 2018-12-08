<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

$view = new View();

$view->articles = Article::findAll();

$view->display(__DIR__ . '/App/Views/admin.php');

