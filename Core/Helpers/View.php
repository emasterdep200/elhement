<?php 
/**
 * @class maneja las vistas del sistema
 */
namespace Core\Helpers;

use Core\Helpers\FilesManager;

function render($pathView)
{
	$PATH = 'App/View/'.$pathView;
	include 'App/View/Layout/app.php';
}