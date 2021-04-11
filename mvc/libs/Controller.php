<?php
namespace libs;

class Controller
{
    public $view;
    public $model;
    public $name_model;
    public $class_name;
    public $path;

    public function __construct()
    {
        $this->view = new View();

        $class_name = get_class($this);
        $class_name = join('', array_slice(explode('\\', $class_name), -1));
        $path = strtolower($class_name);

        $this->class_name = $class_name;
        $this->path = $path;

        if (file_exists($_SERVER ['DOCUMENT_ROOT'] . '/views/' . $path . '/script.js')) {
            $this->view->djs = '/views/' . $path . '/script.js';
        }
        if (file_exists($_SERVER ['DOCUMENT_ROOT'] . '/views/' . $path . '/style.css')) {
            $this->view->dcss = '/views/' . $path. '/style.css';
        }

        $this->name_model = $class_name . '_Model';

        if (file_exists($_SERVER ['DOCUMENT_ROOT'] . '/models/' . strtolower($this->name_model) . '.php')) {
            require_once $_SERVER ['DOCUMENT_ROOT'] . '/models/' . strtolower($this->name_model).'.php';

            $name_model = '\\models\\' . $this->name_model;
            $this->model = new $name_model();
        }
    }
    public function index()
    {
        $this->view->render($this->path);
    }
}
