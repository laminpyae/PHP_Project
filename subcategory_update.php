<?php 
	require('db_connect.php');

	$id = $_POST['id'];
	$name = $_POST['name'];

	$sql = "UPDATE subcategories SET name = :name WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':name', $name);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: subcategory_list.php');
	}
	else {
		echo "Error!";
	}
 ?>