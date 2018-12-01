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

    <!-- Редактирование новости -->
    <hr>
    <h2>Редактирование новости</h2>
    <form action="/update_article.php" method="post">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
        <textarea name="title" cols="60" rows="3"><?php echo $article->title; ?></textarea> <br>
        <textarea name="content" cols="60" rows="20"><?php echo $article->content; ?></textarea> <br>
        <button name="update">Сохранить</button>
    </form>

</body>
</html>
