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
    <h1>Новость</h1>
    <hr>
    <?php if (false !== $article) : ?>
    <h3>
        <?php echo $article->title; ?>
    </h3>
    <p>
        <?php echo $article->content; ?>
    </p>
    <!--
    <p>
        Автор: <?php echo $article->author->name; ?>
    </p>
    -->
    <?php endif; ?>
</body>
</html>

