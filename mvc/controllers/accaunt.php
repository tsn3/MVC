<?php

class Accaunt extends Controller {
    public function __construct()
    {
        if ( User::isLogin() ) {
            parent::__construct();
        }
    }
}
