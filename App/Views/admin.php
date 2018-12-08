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
    <h1>Админ-панель</h1>

    <!-- Список новостей -->
    <hr>
    <h2>Список новостей</h2>
    <?php foreach ($articles as $article) : ?>
    <article>
        <h3> <?php echo $article->title; ?> </h3>
        <a href="/update_article.php?id=<?php echo $article->id; ?>">Редактировать</a>
        <a href="/delete_article.php?id=<?php echo $article->id; ?>">Удалить</a>
    </article>
    <?php endforeach ?>

    <!-- Добавление новости -->
    <hr>
    <h2>Добавление новости</h2>
    <form action="/add_article.php" method="post">
        <textarea name="title" cols="60" rows="3" placeholder="Заголовок"></textarea> <br>
        <textarea name="content" cols="60" rows="10" placeholder="Содержание новости"></textarea> <br>
        <button name="add">Добавить</button>
    </form>

</body>
</html>
