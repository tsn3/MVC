<?php

class Admin_Catalog_Sections extends Controller {
    public function __construct(){
        parent::__construct();

        $this->view->title = 'Управление категориями каталога';
    }
}
