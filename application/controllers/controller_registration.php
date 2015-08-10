<?php

class Controller_Registration extends Controller{
	
	
	function __construct(){
		
		$this->model = new Model_Registration();
        $this->view = new View();
		
	}
	
	
	function action_index(){
		
		if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['name']) && $_POST['password'])
		{
			$check = [
				'name'		=> 'valid',
				'password'	=> 'valid',
				'login' 	=> $this->model->check_valid('login', $_POST['login']),
				'email' 	=> $this->model->check_valid('email', $_POST['email']),
				'phone' 	=> $this->model->check_valid('phone', $_POST['phone']),
			];
			
			if(in_array('no valid', $check)){  // ПРОВЕРЯЕМ ЕСТЬ ЛИ В МАССИВЕ НЕ ВАЛИДНЫЕ ЗНАЧЕНИЯ
				$this->view->generate('check_registration_view.php', 'template_view.php', $check);
			}
			else{
				$registration = $this->model->registration($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['confirm'], $_POST['role']);
				
				if ($registration == 1){
					$dat['reg']  = 1;
				}
				else{
					$dat['reg'] = 0;
				}
				
				$dat['name'] = $_POST['name'];
				
				
				
				$this->view->generate('success_registration_view.php', 'template_view.php',$dat);
				
			}
			
		}
		else{
			$this->view->generate('registration_view.php', 'template_view.php');
		}
			

	}
	
}