<?php 
/**
 * Gestor de archivos, tanto para archivos de tipos: pdf, word, excel
 * como para manipular los archivos de textos y generar contenido por comandos del string
 */
namespace Core\Helpers;

use Core\Helpers\ManagerError;

class FilesManager
{
	private $file;

	function __construct($file,$permise)
	{
		$this->file = $file;
		$this->permise = $permise;
	}

	public function dualInsert($insertSnipert, $search)
	{
		// abre el archivo a manipular
		try{/*
			$file = fopen($this->file, $this->permise);
			if ($file) {
				$content = fread($file,10000); //leer el archivo y devolver una cadena de caracteres.
			}
			fclose($file);*/
			$content = file_get_contents($this->file);
			$var = $this->replaceString($content,$insertSnipert,$search);
			return $this->replaceString($content,$insertSnipert,$search);
		}
		catch(PDOException $e){
			new ManagerError('Error al abrir archivo para vistas','Por favor, dele permiso a la carpeta para poder realizar la acción'.$e->getMessage());
		}
	}

	public function replaceString($content,$toReplace,$search)
	{
		return str_replace($search, $toReplace, $content); 
	}

	public function executeCode($code)
	{
		echo $code;
	}
}