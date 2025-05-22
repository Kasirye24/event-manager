<?php

declare(strict_types=1);

namespace helpers;

class Session
{
    public static function logout()
    {
        if (isset($_POST['session_id'])) {
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            header("location:/admin");
            exit();
        }
    }

    public static function isLoggedIn($session_id)
    {
        if (isset($_SESSION[$session_id])) {
            return true;
        }
        header("location:/");
        exit();
    }


    public function setCookie()
    {}
}
