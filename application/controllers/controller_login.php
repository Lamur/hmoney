<?php

class Controller_Login extends Controller{
	
	
	function __construct(){
		
		$this->model = new Model_Login();
        $this->view = new View();
		
	}
	
	
	function action_index(){
	
		
		//print_r($this->model->test());
	
	
		if (isset($_GET["is_exit"]) && (int)$_GET["is_exit"] === 1) {
			$this->model->out();
			header("Location: /TEST/");
			exit;
		}

		$authResult = null;
	
	
		
		if (isset($_POST["login"]) && isset($_POST["password"])) {

			$authResult = $this->model->auth($_POST["login"], $_POST["password"]);
			
			if ($this->model->isAuth()) {
				header("Location: profile");
				exit;
			}
			else{
				$this->view->generate('login_view.php', 'template_view.php', 'Неверный логин или пароль');
			}
		
		}
		else{
			$this->view->generate('login_view.php', 'template_view.php');
		}

	
	
		
		
	}
	
}