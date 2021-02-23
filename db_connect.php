<?php 
	$servername = "localhost";
	$dbname = "onlineshopping";
	$user = "root";
	$password = "";

	$dsn = "mysql:host = $servername;dbname = $dbname";

	$pdo = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
	try {
		$conn = $pdo;

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected Successfully!";
	} catch (Exception $e) {
		echo "Connection Failed:".$e->getMessage();
	}
 ?>