<?php
namespace models;

use libs\Model;

class Catalog_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        return array('LIST' => array('Samsung', 'IPhone', 'Nokia'));
    }
}
