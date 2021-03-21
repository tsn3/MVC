<?php

class Controller{

    public function __construct(){
        $this->view = new View;
        if (file_exists($_SERVER ['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this)).'/script.js' ) ){
            $this->view->djs = '/views/'.strtolower(get_class($this)).'/script.js';
        }
        if (file_exists($_SERVER ['DOCUMENT_ROOT'].'/views/'.strtolower(get_class($this)).'/style.css') ){
            $this->view->dcss = '/views/'.strtolower(get_class($this)).'/style.css';
        }
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
