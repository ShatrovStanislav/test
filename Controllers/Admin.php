<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Models\Users;
use App\Services\MyException;

class Admin
    extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty(Users::checkSess()) == true) {
            throw new MyException('E403');
        }
    }

    protected function getPath()
    {
        return __DIR__ . '/../Views/Admin/';
    }

    public function actionInsert()
    {
        if (empty($_POST) == false) {
            $article = new Articles();
            $article->data = $_POST;
            $article->insert();
            header('Location: http://test/');
        } else {
            $this->view->display('form');
        }
    }

    public function actionUpdate()
    {
        $article = Articles::findOne((int)$_GET['id']);
        if (empty($_POST) == false) {
            $article->data = $_POST;
            $article->update();
            header('Location: http://test/index.php?ctrl=articles&act=one&id=' . $_GET['id']);
        } else {
            $this->view->values = $article;
            $this->view->display('form');
        }
    }

    public function actionDelete()
    {
        $article = Articles::findOne((int)$_GET['id']);
        $article->delete();
        header('Location: http://test/');
    }
}