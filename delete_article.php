<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$article = Article::findById($_GET['id']);
$article->delete();

header('Location: /admin.php');
exit;

