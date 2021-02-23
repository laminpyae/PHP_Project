<?php 
	require('db_connect.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$codeno = $_POST['codeno'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$brand_id = $_POST['brand'];
	$subcategory_id = $_POST['subcategory'];
	$newphoto = $_FILES['image'];
	// var_dump($newphoto);die();
	$oldphoto = $_POST['oldphoto'];
	$file_path = $oldphoto;

	if ($newphoto['size'] > 0) {
		unlink($oldphoto);

		$source_dir = "image/item/";
		$file_name = mt_rand(100000, 999999);
		$file_exe_array = explode('.', $newphoto['name']);
		$file_exe = $file_exe_array[1];

		$file_path = $source_dir.$file_name.'.'.$file_exe;
		move_uploaded_file($newphoto['tmp_name'], $file_path);
	}

	$sql = 	"UPDATE items SET photo = :photo, name = :name, codeno = :codeno, price = :price, discount = :discount, description = :description, brand_id = :brand, subcategory_id = :subcategory WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':photo', $file_path);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':codeno', $codeno);
	$stmt->bindParam(':price', $price);
	$stmt->bindParam(':discount', $discount);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':brand', $brand_id);
	$stmt->bindParam(':subcategory', $subcategory_id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header('location: item_list.php');		
	}
	else {
		echo "Error!";
	}
 ?>