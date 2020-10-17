<?php 
/**
 * Crea contenido html para gestion 
 * de controladores
 */
namespace Core\Helpers;

class CreateDOM
{

	public static function DOM(CreateDOM $instance,$html,$content,$class = null)
	{
		return '<'.$html.' class="'.$class.'">'.$content.'</'.$html.'>';
	}
}
