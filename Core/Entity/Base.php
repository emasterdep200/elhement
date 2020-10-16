<?php 

/**
 * Esta clase se encargará de ser la base para los demás modelos de datos.
 */

namespace Core\Entity;

class Base
{
	protected $id = 0;
	protected $mapping = ['id' => 'id'];

	public function getId() : int
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public static function arrayToEntity($data, Base $instance)
	{
		if ($data && is_array($data)) {
			foreach ($instance->mapping as $dbColumn => $propertyName) {
				$method = 'set' . ucfirst($propertyName);
				$instance->$method($data[$dbColumn]);
			}
			return $instance;
		}
		return FALSE;
	}

	public function entityToArray()
	{
		$data = array();
		foreach ($this->mapping as $dbColumn => $propertyName) {
			$method = 'get' . ucfirst($propertyName);
			$data[$dbColumn] = $this->$method() ?? NULL;
		}
		return $data;
	}
}

/* 
Ejemplo de mapiado de datos:
(solo se usa cuando no concuerdan los campos de la clase con lo de
la base de datos.)

protected $mapping = [
	'id'	 		=> 'id',
	'nombre' 		=> 'nombre',
	'apellido' 		=> 'apellido',
	'nacimiento' 	=> 'nacimiento',
	'password' 		=> 'password'
];
*/