<?php

use App\Models\Article;

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
    $article = Article::findById($_GET['id']);
    include __DIR__ . '/App/Views/update_article.php';
}

