<?php

class Controller_Main extends Controller{
	
	
	function __construct(){
		
		$this->model = new Model_Main();
        $this->view = new View();
		
	}
	
	
	function action_index(){

			if ($this->model->isAuth()) {
				header("Location: profile");
				exit;
			}
			else{
				$this->view->generate('main_view.php', 'template_view.php');
			}
		
	}
	
}