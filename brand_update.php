<?php 
	require('db_connect.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$newlogo = $_FILES['image'];

	$oldlogo = $_POST['oldlogo'];
	$file_path = $oldlogo;

	if ($newlogo['size'] > 0) {
		unlink($oldlogo);

		$source_dir = "image/brand/";
		$file_name = mt_rand(100000, 999999);
		$file_exe_array = explode('.', $newlogo['name']);
		$file_exe = $file_exe_array[1];

		$file_path = $source_dir.$file_name.'.'.$file_exe;

		move_uploaded_file($newlogo['tmp_name'], $file_path);
	}
	$sql = "UPDATE brands SET logo = :logo, name = :name WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':logo', $file_path);
	$stmt->bindParam(':name', $name);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: brand_list.php');
	}
	else {
		echo "Error!";
	}
 ?>