<?php 
/**
 * Gestor de archivos, tanto para archivos de tipos: pdf, word, excel
 * como para manipular los archivos de textos
 */
namespace Core\Helpers;

class FilesManager
{
	private $file;
	private $permise;
	
	function __construct($file,$permise)
	{
		$this->file = $file;
		$this->permise = $permise;
	}

	public function dualInsert($insertSnipert)
	{
		// abre el archivo a manipular
		$file = fopen($this->file, $this->permise);
		if ($file) {
			$content = fread($file); //leer el archivo y devolver una cadena de caracteres.
			$contentModify = $content;
			fwrite($file, $contentModify);
		}
		fclose($file);
	}
}