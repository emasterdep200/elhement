<?php 

/**
 * maneja los errores y los muestra en la vista 
 */
namespace Core\Helpers;

use Core\Helpers\CreateDOM;

class ManagerError 
{
	protected $menssage;

	protected $code;

	protected $typeError;

	protected $styleCss;
	
	function __construct(String $typeError, String $menssage,$code=null)
	{
		$this->menssage = $menssage;
		$this->code = $code;
		$this->typeError = $typeError;
		$this->styleOFerror();
		$this->buildView();
	}

	private function buildView()
	{
		$DOMInstance = new CreateDOM();
		$h2 = CreateDOM::DOM($DOMInstance,'h2',$this->typeError);
		$h3 = CreateDOM::DOM($DOMInstance,'h3','Código de error: '.$this->code);
		$phaser = CreateDOM::DOM($DOMInstance,'p',$this->menssage);
		$description = CreateDOM::DOM($DOMInstance,'div',$phaser,'containt-manager__description');
		$title = CreateDOM::DOM($DOMInstance,'div',$h2.$h3,'containt-manager__title');
		$mainDiv = CreateDOM::DOM($DOMInstance,'div',$title.$description,'containt-manager');
		$errorMain = CreateDOM::DOM($DOMInstance,'div',$mainDiv.$this->styleCss,'error-manager');
		$htmlGeneral = CreateDOM::structHTML($errorMain);
		echo $htmlGeneral;
		die();
	}

	private function styleOFerror()
	{
		switch ($this->code) {
			case '404':
				$this->styleCss = '<style type="text/css">*{margin:0px;}.error-manager{padding: 20px; display:flex; justify-content: center; background: lightgray;}.containt-manager{ background: #f2f2f2; padding: 20px; }.containt-manager__title{ background: white; text-align: center; padding: 10px;}.containt-manager__title h3{ color: gray; margin-top: 10px; } .containt-manager__description{ background: white; margin-top: 20px; padding: 20px;text-align: justify;}</style>';
				break;
			case '500':
				$this->styleCss = '<style type="text/css">*{margin:0px;}.error-manager{padding: 20px; display:flex; justify-content: center; background: lightgray;}.containt-manager{ background: red; padding: 20px; }.containt-manager__title{ background: white; text-align: center; padding: 10px;}.containt-manager__title h3{ color: gray; margin-top: 10px; } .containt-manager__description{ background: white; margin-top: 20px; padding: 20px;text-align: justify;}</style>';
				break;
			case '200':
				$this->styleCss = '<style type="text/css">*{margin:0px;}.error-manager{padding: 20px; display:flex; justify-content: center; background: lightgray;}.containt-manager{ background: green; padding: 20px; }.containt-manager__title{ background: white; text-align: center; padding: 10px;}.containt-manager__title h3{ color: gray; margin-top: 10px; } .containt-manager__description{ background: white; margin-top: 20px; padding: 20px;text-align: justify;}</style>';
				break;
			
			default:
				$this->styleCss = '<style type="text/css">*{margin:0px;}.error-manager{padding: 20px; display:flex; justify-content: center; background: lightgray;}.containt-manager{ background: black; padding: 20px; }.containt-manager__title{ background: white; text-align: center; padding: 10px;}.containt-manager__title h3{ color: gray; margin-top: 10px; } .containt-manager__description{ background: white; margin-top: 20px; padding: 20px;text-align: justify;}</style>';
				break;
		}
	}
}