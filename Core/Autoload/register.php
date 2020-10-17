<?php 
//incluir todos los archivos del core

//helpers
include DIR_FILES . 'Core/Helpers/createDOM.php';
include DIR_FILES . 'Core/Helpers/ManagerError.php';
include DIR_FILES . 'Core/Helpers/Request.php';
//rutas
include DIR_FILES . 'Core/Route/Route.php';
// instanciar la clase ruta para la gestion de rutas
$route = new Core\Route\Route(1);
include DIR_FILES . 'App/Route/web.php';
//base de datos
include DIR_FILES . 'Core/Config/database.php';
include DIR_FILES . 'Core/Database/conetion.php';
include DIR_FILES . 'Core/Database/Finder.php';
include DIR_FILES . 'Core/Database/Paginate.php';
//entidades
include DIR_FILES . 'Core/Entity/Base.php';




