<?php

require_once "autoload.php";

class Routing
{

	private $defaultController;

	public function __construct()
	{
		$this->defaultController = '';
	}

	public function route($url)
	{
		$routes = explode("/",$url);

		$controller = ucfirst($routes[1]);
		$action = $routes[2];

		$controller = 'App\Controllers\\'.$controller."Controller";
		
		try {
			$resultController = new $controller();
		} catch (Exception $e) {
			echo $e->getMessage()."\n";

			//Надо вернуть ошибку.
			return;
		}

		try {
			$resultController->$action();
		} catch (Exception $e) {
			echo $e->getMessage()."\n";
			
			//Надо вернуть ошибку.
			return;
		}
	}
}