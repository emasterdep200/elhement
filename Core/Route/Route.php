<?php 
/**
 * clase para gestionar las rutas de la aplicacion
 */
namespace Core\Route;

class Route
{
	private $uri;
	private $route = [];

	function __construct()
	{
		
	}

	public function setRoute($route)
	{
		if (is_array($route)) {
			$this->$route[] = $route;
		}else{
			// aquí va una excepcion tipo error
		}
	}

	public static function get(Route $instance, Array $routeToRegister)
	{

	}

	public static function post(Route $instance, Array $routeToRegister)
	{
		
	}

	public function managerRoute()
	{
		
	}

}