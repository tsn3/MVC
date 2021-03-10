<?php

class View{

    public $arResult = array();
    public function __construct()
    {
    }

    public function render ( $path, $file_name = 'index' ){
        if (file_exists($_SERVER ['DOCUMENT_ROOT'].'/views/'.$path.'/'.$file_name.'.php')){
            require $_SERVER ['DOCUMENT_ROOT'].'/views/'.$path.'/'.$file_name.'.php';
        }
    }
}
