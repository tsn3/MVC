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
        if (($handle = fopen("import.csv", "r")) !== FALSE) {

            $attributes = fgetcsv($handle, 0, ';');
            $products = array();
            $i = 0;

            while (($row = fgetcsv($handle, 0, ";")) !== FALSE) {
                $products[$i] = array_combine($attributes, $row);
                $i++;
            }
        }
        fclose($handle);


        if (!isset($products)) {
            throw new Exception("Import was unsuccessfully");
        }

        return $products;
//        return array('LIST' => array('Samsung', 'IPhone', 'Nokia'));
    }
}
