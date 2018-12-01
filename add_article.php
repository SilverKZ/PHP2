<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

if (isset($_POST['add'])) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();
}

header('Location: /admin.php');
exit;

