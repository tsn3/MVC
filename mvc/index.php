<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function dump() {
    echo '<pre>';

    foreach (func_get_args() as $v) {
        print_r($v);
        echo PHP_EOL;
        echo PHP_EOL;
    }

    echo '</pre>';
}

require_once 'libs/Autoloader.php';
use libs\App;

$app = new App;
