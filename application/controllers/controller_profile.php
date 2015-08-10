<?php

class Controller_Profile extends Controller{
	
	
	function __construct(){
		
		$this->model = new Model_Profile();
        $this->view = new View();
		
	}
	
	
	function action_index(){
		
		if (isset($_GET["is_exit"]) && (int)$_GET["is_exit"] === 1) {
			$this->model->out();
			header("Location: /TEST/");
			exit;
		}
		else{
			if ($this->model->isAuth()) {
				$data = $_SESSION;
				$this->view->generate('profile_view.php', 'template_view.php', $data);
			}
			else{
				header("Location: /TEST/");
				exit;
			}
		}
		

		
	}
	
}