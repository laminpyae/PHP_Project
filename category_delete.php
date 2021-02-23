<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM categories WHERE id = :id";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: category_list.php');
	}
	else {
		echo "Error!";
	}
 ?>