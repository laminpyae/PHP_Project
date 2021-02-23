<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM brands WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: brand_list.php');
	}
	else {
		echo "Error!";
	}
 ?>