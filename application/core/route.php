<?PHP

class Route
{
	static function start(){
		
		//контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		
		$gets   = explode('?',$_SERVER['REQUEST_URI']);
		$routes = explode('TEST/', $gets[0]);
		
		
		
		// Receive controller name
		if( !empty($routes[1]) ){
			$controller_name = $routes[1];
		}
		
		//Receive action name
		if( !empty($routes[2]) ){
			$action_name = $routes[2];
		}
		
		//Add prefix
		$model_name  		= 'Model_'.$controller_name;
		$controller_name	= 'Controller_'.$controller_name;
		$action_name		= 'Action_'.$action_name;
		
		//Add file with model class
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path)){
			include "application/models/".$model_file;
		}
		
		//Add file with controller class
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path)){
			include "application/controllers/".$controller_file;
		}
		else{
			//Add redirect 404 page (But it would be correct to describe an exeption)
			Route::ErrorPage404();
		}
		
		//Create controller
		$controller = new $controller_name;
		$action 	= $action_name;

		if(method_exists($controller,$action)){			
			//Call controller action
			$controller->$action();
		}
		else{
			Route::ErrorPage404();
		}	
		
		
		//echo $model_name, $controller_name, $action_name;
	}
	
	function ErrorPage404(){
		$host 	= 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header('status 404 Not Found');
		header('Location:'.$host.'404');
	}
}