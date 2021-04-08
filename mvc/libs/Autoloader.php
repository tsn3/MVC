<?php

require_once 'Config.php';
require_once 'App.php';
require_once 'Controller.php';
require_once 'View.php';
require_once 'Model.php';
require_once 'Database.php';
require_once 'User.php';

//spl_autoload_register( function ($className) {
//    $className = ltrim($className, '\\');
//    $fileName  = '';
//    $namespace = '';
//    if ($lastNsPos = strrpos($className, '\\')) {
//        $namespace = substr($className, 0, $lastNsPos);
//        $className = substr($className, $lastNsPos + 1);
//        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
//    }
//    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
//
//    require $fileName;
//});
