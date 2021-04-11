<?php
namespace libs;

class User
{
    static function isLogin()
    {
        if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']) {
            return true;
        } else {
            return false;
        }
    }
    static function getID()
    {
        if (isset($_SESSION['USER_ID'])) {
            return $_SESSION['USER_ID'];
        } else {
            return false;
        }
    }

    static function getName()
    {
        if (isset($_SESSION['USER_NAME'])) {
            return $_SESSION['USER_NAME'];
        } else {
            return false;
        }
    }

    static function logout()
    {
        session_destroy();
    }
}
