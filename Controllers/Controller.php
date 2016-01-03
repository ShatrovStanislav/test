<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Services\View;

abstract class Controller
{
    protected $view;

    abstract protected function getPath();

    public function __construct()
    {
        $this->view = new View($this->getPath());
    }

    public function actionAll()
    {
        $this->view->values = Articles::findAll();
        $this->view->display('all');
    }

    public function actionOne()
    {
        $this->view->values = Articles::findOne((int)$_GET['id']);
        $this->view->display('one');
    }
}