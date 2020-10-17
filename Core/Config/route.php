<?php 

/**
 * Configuraciones para el enrutador. 
 */

$config = [
		'home' => [
		'uri' => '!^/$!',
		'exec' => function ($matches) {
			include PAGE_DIR . '/page0.php'; 
		}
	],
		'page' => [
		'uri' => '!^/(page)/(\d+)$!',
		'exec' => function ($matches) {
			include PAGE_DIR . '/page' . $matches[2] . '.php'; 
		}
	],
		Router::DEFAULT_MATCH => [
		'uri' => '!.*!',
		'exec' => function ($matches) {
			include PAGE_DIR . '/sorry.php'; 
		}
	],
];