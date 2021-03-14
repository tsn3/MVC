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

                header('location:'.'/account/');
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
    }

    public function reg(){

        if (User::isLogin() ){
//            echo "{'error':'You dont have permision'}";
            header('location:'.'/account/');
            die;
        }
        $error = array();
        $login = htmlspecialchars($_REQUEST['login']);
        $pass_1 = htmlspecialchars($_REQUEST['pass_1']);
        $pass_2 = htmlspecialchars($_REQUEST['pass_2']);
        $name = htmlspecialchars($_REQUEST['name']);
        $phone = htmlspecialchars($_REQUEST['phone']);
        $email = htmlspecialchars($_REQUEST['email']);

        if ($login == ''){
            $error['login'] = false;
        }
        if ($pass_1 != $pass_2){
            $error['pass'] = false;
        }
        if ($pass_1 == ''){
            $error['pass'] = false;
        }
        if ($this->model->loginExist($login) ){
            $error['login'] = false;
        }
        if (count($error) > 0){
            echo json_encode();
            die;
        }
        $data = array(
            ':login' => $login,
            ':password' => $pass_1,
            ':name ' => $name,
            ':phone' => $phone,
            ':email' => $email,
        );

        if ($this->model->register($data) ){

        }else{

        }
        die;

    }

}