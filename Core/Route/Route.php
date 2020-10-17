<?php 
/**
 * clase para gestionar las rutas de la aplicacion
 */
namespace Core\Route;

use Core\Helpers\ManagerError;

class Route
{
	private $uri;
	private $route = [];
	/**
	 * ['route' 		=> 'ruta',
	 *  'type' 			=> 'GET o POST',
	 *  'controller' 	=> 'nombre del controlador',
	 *  'action' 		=> 'accion a ejecutar en el controlador']
	 * @var [array]
	 */
	private $numberRoute;

	public function __construct($number)
	{
		//indica el numero a partir del cual se contara para armar la ruta.
		$this->numberRoute = $number;
		$this->extractRouteClean();
	}

	public static function get(Route $instance, $routeToRegister)
	{
		if (is_array($routeToRegister)) {
			$routeToRegister['type'] = 'GET';
			//verifica que la ruta que se instrodusca no exista
			if (self::searchRoute($instance,$routeToRegister['route'])) {
				new ManagerError('La ruta esta repetida',
					'La ruta: '.$routeToRegister['route'].' - Existe ya en el sistema. Por favor, registre otra ruta.');
			}else{
				$instance->route[] = $routeToRegister;
			}
		}else{
			new ManagerError('La ruta no es un array','el string: '.$routeToRegister);
		}
	}

	public static function post(Route $instance, Array $routeToRegister)
	{
		
	}

	public function managerRoute()
	{
		//para verificar que la ruta exista
		$routeExist = false;
		foreach ($this->route as $route) {
			if ($route['route'] == $this->uri) {
				//aquí empezamos a llamar a los controladores
				if ($route['type'] == 'GET') {
					$classController = 'App\Controller\\'.$route['controller'];
					$action = $route['action'];
					//incluimos el controlador
					require 'App/Controller/'.$route['controller'].'.php';
					try {
						$object = new $classController;
						$object->$action();
					} catch (PDOException $e) {
						new ManagerError('Error al instanciar la clase',
							'El error el siguiente: '.$e->getMessage()
						);
					}
				}
				$routeExist = true;
			}
		}
		if (!$routeExist) {
			new ManagerError('Ruta desconocida',
				'La ruta - '.$this->uri.' - no se encuentra en el sistema. Verifique la ruta que coloco.',
				'404');
		}
	}

	private function extractRouteClean()
	{
		$this->uri = explode('/', substr($_SERVER['REQUEST_URI'],1, strlen($_SERVER['REQUEST_URI']) - 1));
		$nameRoute = ' ';
		for ($i = 0; $i < count($this->uri); $i++) { 
			if ($i <= $this->numberRoute) {
				continue;
			}else{
				$nameRoute .= '/';
				$nameRoute .= $this->uri[$i];
			}
		}
		$this->uri = substr($nameRoute, 1, strlen($nameRoute));
		$this->uri = substr($this->uri, 1, strlen($this->uri));
	}

	public static function searchRoute(Route $instance,$routeToSearch)
	{
		foreach ($instance->route as $route) {
			if ($route['route'] == $routeToSearch) {
				return true;
			}
		}
		return false;
	}

}