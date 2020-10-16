<?php 

/** 
 * esta clase se usa para construir consultas a partir de llamados de funciones 
 * en el objeto.
 */

namespace Core\Database;

class Finder 
{
	public static $sql = '';
	public static $instance = NULL;
	public static $prefix = '';
	public static $where = array();
	public static $control = ['', ''];
	
	// $a == nombre de la tabla
	// $cols = nombre de las columnas
	public static function select($a, $cols = NULL)
	{
		self::$instance = new Finder();
		if ($cols) {
			self::$prefix = 'SELECT ' . $cols . ' FROM ' . $a;
		} else {
			self::$prefix = 'SELECT * FROM ' . $a;
		}
		return self::$instance;
	}

	public static function where($a = NULL)
	{
		self::$where[0] = ' WHERE ' . $a;
		return self::$instance;
	}

	public static function like($a, $b)
	{
		self::$where[] = trim($a . ' LIKE ' . $b);
		return self::$instance;
	}

	public static function and($a = NULL)
	{
		self::$where[] = trim('AND ' . $a);
		return self::$instance;
	}
}