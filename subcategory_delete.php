<?php 
	require('db_connect.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM subcategories WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: subcategory_list.php');
	}
	else {
		echo "Error!";
	}
 ?>