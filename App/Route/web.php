<?php 
/**
 * Creación de las rutas para el sistema. 
 * $route es la instancia del core de rutas
 * Las rutas -> get -> son para mostrar páginas especificas, o pasar parametros get.
 * las rutas -> post -> es para envio de datos de formularios.
 * Cada una será tratada de acuerdo a como se registre.
 */

Route::get($route, ['route'=>'','action'=>'index','controller'=>'HomeController']); //home
