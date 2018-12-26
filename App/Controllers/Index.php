<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class Index extends Controller
{
    protected function index()
    {
        $this->view->articles = Article::findLast(3);

        $this->view->display(__DIR__ . '/../Views/index.php');
    }

    protected function access(): bool
    {
        return true;
    }
}

