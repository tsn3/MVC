<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){
        if (isset($_POST['login'])&&isset($_POST['login']) && false) {

        }else{
            $this->view->arResult['ERROR'] = "Неверный логин или пароль";
            $this->index();
        }
    }
}