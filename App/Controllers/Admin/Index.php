<?php

namespace App\Controllers\Admin;

use App\Classes\Controller;

class Index extends Controller
{
    protected function index()
    {
        $this->view->display(__DIR__ . '/../../Views/admin/index.php');
    }

    protected function access(): bool
    {
        return true;
    }
}

