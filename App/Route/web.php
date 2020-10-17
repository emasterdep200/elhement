<?php 
/**
 * Creación de las rutas para el sistema. 
 * $route es la instancia del core de rutas
 */
use Core\Route\Route;

Route::get($route, ['route'=>'','action'=>'index','controller'=>'HomeController']); //home


$route->managerRoute();