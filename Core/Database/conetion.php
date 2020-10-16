<?php 

require '../Config/database.php';

try {
	$dsn = sprintf('pgsql:host=%s;dbname=%s;user=%s;password=%s',
		$params['host'],
		$params['db'],
		$params['user'],
		$params['pwd']);
	$opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$pdo = new PDO($dsn, $params['user'], $params['pwd'], $opts);
} catch (PDOException $e) {
	echo $e->getMessage();
} catch (Throwable $e) {
	echo $e->getMessage();
}