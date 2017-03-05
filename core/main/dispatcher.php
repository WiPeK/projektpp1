<?php

class dispatcher
{
	public static function dispatch($router)
	{
		ob_start();
		$config = registry::register('configs');
		//$sgException = registry::register('sgException');

		if($router instanceof router)
		{
			$controller = $router->getController();
			$action = $router->getAction();
			$params = $router->getParams();
			if(empty($controller))
				$controller = "home";
		}
		else
		{
			//$sgException->throwException("Router nie został znaleziony lub nie jest instancją tej klasy.");
			echo 'error no 1';
		}
		
		$controllerfile = $config->controller_path . $controller . '.php';

		if(!file_exists($controllerfile))
		{
			//$sgException->throwException("Kontroller '" . $controller . "' nie został znaleziony w systemie!");
			var_dump($controllerfile);
			echo 'error no 2';
		}

		include_once($controllerfile);
		$sys = new $controller();
		if(!empty($params[0]) && !empty($params[1]))
		{
			$sys->$action($params[0], $params[1]);
		}
		else if(!empty($params[0]) && empty($params[1]))
		{
			$sys->$action($params[0]);
		}
		else
		{
			$sys->$action();
		}
		

		ob_start();

	// 	$view = registry::register("view");

	// 	if(!empty($sys->template)) 
	// 		$view->setTemplate($sys->template);

	// 	$template = $view->getTemplate($action);

	// 	main::_templateLoader($controller, $template);
	}	
}