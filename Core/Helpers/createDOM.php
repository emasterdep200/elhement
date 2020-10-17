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

	public static function structHTML($content)
	{
		return '<!DOCTYPE html><html lang="es"><head><title>Error</title><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"></head><body>'.$content.'</body></html>';
	}

}
