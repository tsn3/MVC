<?php
namespace libs;
use libs\Database;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
