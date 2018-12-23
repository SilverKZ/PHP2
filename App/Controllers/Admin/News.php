<?php

namespace App\Controllers\Admin;

use App\Classes\Controller;
use App\Models\Article;

class News extends Controller
{
    protected function index()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../Views/admin/news.php');
    }

    protected function delete()
    {
        $article = Article::findById($this->params[4]);
        $article->delete();
        $this->redirect('/admin/news');
    }

    protected function get()
    {
        if (isset($this->params[4])) {
            $this->view->article = Article::findById($this->params[4]);
            $this->view->display(__DIR__ . '/../../Views/admin/update_article.php');
        }
    }

    protected function update()
    {
        $article = Article::findById($_POST['id']);
        $article->fill($_POST);
        $article->save();
        $this->redirect('/admin/news');
    }

    protected function add()
    {
        $article = new Article();
        $article->fill($_POST);
        $article->save();
        $this->redirect('/admin/news');
    }

    protected function access(): bool
    {
        return true;
    }
}

