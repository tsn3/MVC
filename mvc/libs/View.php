<?php

class View{
    public function __construct()
    {
    }

    public function render ( $path){
        if (file_exists($_SERVER ['DOCUMENT_ROOT'].'/views/'.$path.'/index.php')){
            require $_SERVER ['DOCUMENT_ROOT'].'/views/'.$path.'/index.php';
        }
    }
}
