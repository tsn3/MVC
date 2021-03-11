<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){
        if (isset($_POST['login']) && isset($_POST['password']) ) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);

            if ($this->model->login($login, $password) ){

                header('location:'.'/accaunt/');
            }else{
                $this->view->arResult['ERROR'] = "Неверный логин или пароль";
                $this->index();
            }
        }else{
            $this->view->arResult['ERROR'] = "Неверный логин или пароль";
            $this->index();
        }
    }

    public function logout() {
        User::logout();
        header('location:'.'/');
//        возможно удалить...

    }
}