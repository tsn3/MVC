<?php

class Controller{
    public function __construct(){
        $this->view = new View;
        $this->name_model = get_class($this).'_Model';
        if(file_exists($_SERVER ['DOCUMENT_ROOT'].'/models/'.strtolower($this->name_model).'.php')){
            require_once $_SERVER ['DOCUMENT_ROOT'].'/models/'.strtolower($this->name_model).'.php';
            $this->model = new $this->name_model;
        }
    }
    public function index(){
        $this->view->render(strtolower(get_class($this)));
    }

}
