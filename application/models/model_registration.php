<?php
session_start();

class Model_Registration extends Model{
		
	public function check_valid($row, $value){
		
		$data = [];
		$to_db = [];
		
		$User = require __DIR__.'/../../config.php';
		
		$l = new mysqli($User['db_host'], $User['db_user'], $User['db_pass'], $User['db_name'])
		or die ('Невозможно открыть базу');
		
		$sql = "Select * from users WHERE ".$row."='".$value."'";
		$login = $l->query($sql) or die(mysql_error());
		$num = $login->num_rows;
		
		if ($num == 0){
			return 'valid';
		}else{
			return 'no valid';   
		}
	}
	
	

    public function registration($name, $login, $password, $email, $phone, $confirm, $role) { //$_POST['name'], $_POST['login'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['confirm'], $_POST['role']);
       
	   $User = require __DIR__.'/../../config.php';
		
		$l = new mysqli($User['db_host'], $User['db_user'], $User['db_pass'], $User['db_name'])
		or die ('Невозможно открыть базу');
		
		$sql = "Insert into users (login, name, password, email, phone, id_role, confirm_email) VALUES ('".$login."','".$name."','".md5($password)."','".$email."','".$phone."',".$role.",".$confirm.")";
		$login = $l->query($sql) or die(mysql_error());
		
		
		if ($login == true)
		{
			return true;
		}
		else{
			return false;
		}
		
	   
    }

}