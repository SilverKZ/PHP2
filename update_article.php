<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/autoload.php';

if (isset($_POST['id'])) {
    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    header('Location: /admin.php');
    exit;
}

if (isset($_GET['id'])) {
    $view = new View();
    $view->article = Article::findById($_GET['id']);
    $view->display(__DIR__ . '/App/Views/update_article.php');
}

