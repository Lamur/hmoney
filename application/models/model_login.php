<?php
session_start();



class Model_login extends Model{
		
	public function isAuth() {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        }

        return false;
    }
	
	public function test(){
		$User = require __DIR__.'/../../config.php';	
		$l = new mysqli($User['db_host'], $User['db_user'], $User['db_pass'], $User['db_name'])
		or die ('Невозможно открыть базу');
		
		$sql = "Select users.*, role.role as roles from users, role where users.id_role = role.id";
		$bd = $l->query($sql) or die(mysql_error());
		$num = $bd->num_rows;
		$row = $bd->fetch_assoc();
		return $row;
		
		
	}

    public function auth($login, $passwors) {
        $User = require __DIR__.'/../../config.php';	
        $_SESSION["is_auth"] = false;
        $_SESSION["login"] = 'guest';

		$l = new mysqli($User['db_host'], $User['db_user'], $User['db_pass'], $User['db_name'])
		or die ('Невозможно открыть базу');
		
		$sql = "Select users.*, role.role as rolet from users, role where users.id_role = role.id and login='".$login."' and password='".md5($passwors)."'";
		$bd = $l->query($sql) or die(mysql_error());

		$num = $bd->num_rows;
		if ($num > 0){
			while ($row = $bd->fetch_assoc()){
				
				if ($row['confirm_email'] == 1){
					
					$_SESSION["is_auth"] = true;
					$_SESSION["login"] = $row['login'];
					$_SESSION["name"]  = $row['name'];
					$_SESSION["role"]  = $row['rolet'];
					$_SESSION["email"] = $row['email'];
					$_SESSION["phone"] = $row['phone'];
				
					return $row = $bd->fetch_assoc();
				}	
				else{
					return false;
				}
			};   
		};
		

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