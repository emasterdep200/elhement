<?php 
/**
 * Controlador encargado de las acciones del home
 */
namespace App\Controller;

class HomeController
{
	
	public function index()
	{
		\Core\Helpers\render('Auth/recuperacion.php');
	}
	
}