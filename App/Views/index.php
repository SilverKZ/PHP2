<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт</title>
</head>
<body>
    <h1>Новости</h1>
    <hr>
    <?php foreach ($articles as $article) : ?>
    <h3>
        <a href="/article.php?id=<?php echo $article->id; ?>">
            <?php echo $article->title; ?>
        </a>
    </h3>
    <p>
        <?php echo $article->content; ?>
    </p>
    <!--
    <p>
        Автор: <?php echo $article->author->name; ?>
    </p>
    -->
    <?php endforeach ?>
</body>
</html>
