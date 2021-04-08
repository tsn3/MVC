<?php
namespace libs;
//use controllers\Index;

class App{
    public function __construct()
    {
        session_start();

        if ( isset($_GET['url'])) {
            $url = explode('/',rtrim($_GET['url'], '/'));
        } else {
            $url[0] = 'index';
        }
        $file_name = 'controllers/' .$url[0]. '.php';
//      echo $file_name;


        if (file_exists($file_name)) {
//    Подключение контроллера
            require_once $file_name;
//            print_r($url);
            $className = '\\controllers\\' . ucfirst($url[0]);
            $controller = new $className();
//            var_dump($controller);
//    Вызов метода
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
//                    Передача параметров методу
                    if ( isset($url[2])) {
                        $controller->{$url[1]}($url[2]);
                    } else {
                        $controller->{$url[1]}();
                    }
                } else {
                    echo 'Error method dose not exist';
                }
            } else {
                $controller->index();
            }
        } else {
            echo 'Error file dose not exist';
        }
    }
}
