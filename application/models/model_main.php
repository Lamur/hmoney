<?php
session_start();

class Model_Main extends Model{
	
	public function isAuth() {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        }

        return false;
    }

    public function auth($login, $passwors) {
        $User = require __DIR__.'/../config.php';

        $_SESSION["is_auth"] = false;
        $_SESSION["login"] = 'guest';

        foreach ($User as $val) {
            if ($login === $val['login'] && $passwors === $val['passs']) {
                    $_SESSION["is_auth"] = true;
                    $_SESSION["login"] = $login;
                    $_SESSION["role"] = $val['role'];

                    return true;
            }
        }

        return false;
    }

    public function getLogin() {
        if ($this->isAuth()) {
            return $_SESSION["login"];
        }
    }

    public function getRole() {
        if ($this->isAuth()) {
            return $_SESSION["role"];
        }
    }

    public function out() {
        $_SESSION = array();
        session_destroy();
    }

}