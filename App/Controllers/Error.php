<?php

namespace App\Controllers;

use App\Classes\Controller;

class Error extends Controller
{
    protected function dataBase()
    {
        $this->view->error = $this->params;

        $this->view->display(__DIR__ . '/../Views/error.php');
    }

    protected function notFound()
    {
        $this->view->error = $this->params;

        $this->view->display(__DIR__ . '/../Views/error.php');
    }

    protected function validate()
    {
        $this->view->errors = $this->params;

        $this->view->display(__DIR__ . '/../Views/admin/validate.php');
    }
}

