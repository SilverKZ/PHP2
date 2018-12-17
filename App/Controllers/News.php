<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;

class News extends Controller
{
    protected function index()
    {
        $this->view->articles = Article::findAll();

        $this->view->display(__DIR__ . '/../Views/index.php');
    }

    protected function article()
    {
        $this->view->article = Article::findById($this->params[3]);

        $this->view->display(__DIR__ . '/../Views/article.php');
    }

    protected function access(): bool
    {
        return true;
    }
}

