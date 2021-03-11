<?php

class Login_Model extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function login ($login, $password){
        $sth = $this->db->prepare("SELECT id, name FROM users WHERE " . "login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $login,
            ':password' => md5($password),
        ));

        if ( $sth->rowCount() > 0 ){
            $data = $sth->fetch();

            $_SESSION['LOGIN'] = true;
            $_SESSION['USER_ID'] = $data["id"];
            $_SESSION['USER_NAME'] = $data["name"];
//            var_dump($_SESSION);
            return true;
        } else {
            return false;
        }



    }

}
