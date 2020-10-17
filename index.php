<?php 
/**
 * @description este archivo carga todos los recuerso necesarios para gestionar 
 * las peticiones del usuario y las vistas
 */

require __DIR__ . '/Core/Autoload/Loader.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo</title>
</head>
<body>
	<div class="error-manager">
		<div class="containt-manager">
			<div class="containt-manager__title">
				<h2>Problema con renderizados</h2>
				<h3>Codigo de error: 404</h3>
			</div>
			<div class="containt-manager__description">
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit, dolor! Quisquam suscipit praesentium deleniti fugit recusandae necessitatibus accusantium placeat ex, veniam accusamus soluta voluptatibus ea minus quaerat blanditiis commodi sunt.</p>
			</div>
		</div>
	</div>
<style type="text/css">
		.error-manager{
  padding: 20px;
  width: 100%;
}

.containt-manager{
  background: #f2f2f2;
  padding: 20px;
}

.containt-manager__title{
  background: white;
  text-align: center;
  padding: 10px;
}

.containt-manager__title h3{
  color: gray;
  margin-top: 10px;
}

.containt-manager__description{
  background: white;
  margin-top: 20px;
  padding: 20px;
  text-align: justify;
}
</style>
</body>
</html>