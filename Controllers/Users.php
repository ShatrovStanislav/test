<?php

namespace App\Controllers;

class Users
    extends Controller
{
    protected function getPath()
    {
        return __DIR__ . '/../Views/Admin/';
    }

    public function actionLogin()
    {
        if (empty($_POST) == false) {
            $user = \App\Models\Users::login($_POST);
            if (empty($user) == false) {
                $sess = md5(microtime());
                $user->setSess($sess);
                $_SESSION['sess'] = $sess;
                header('Location: http://test/index.php');
            } else {
                $this->view->msg = 'Неверный логин или пароль';
                $this->view->display('login');
            }
        } else {
            $this->view->display('login');
        }
    }

    public function actionLogout()
    {
        unset($_SESSION['sess']);
        header('Location: http://test/');
    }
}