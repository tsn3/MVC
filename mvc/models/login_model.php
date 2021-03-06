<?php
namespace models;

use libs\Model;

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($login, $password)
    {
        $sth = $this->db->prepare("SELECT id, name, role FROM users WHERE " . "login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $login,
            ':password' => md5($password),
        ));

        if ($sth->rowCount() > 0) {
            $data = $sth->fetch();
            $_SESSION['LOGIN'] = true;
            $_SESSION['USER_ID'] = $data["id"];
            $_SESSION['USER_NAME'] = $data["name"];
            $_SESSION['USER_ROLE'] = $data["role"];
            return true;
        } else {
            return false;
        }
    }

    public function loginExist($login)
    {
        $sth = $this->db->prepare("SELECT id, name FROM users WHERE "
            . "login = :login");
        $sth->execute(array(
            ':login' => $login,
        ));
        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function register($data)
    {
        $sth = $this->db->prepare("INSERT users (login, password, name, email, phone) " . " VALUES (:login, :password, :name, :email, :phone) ");
        $sth->execute($data);
        if ($sth->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
