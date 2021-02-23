<?php 
	require('db_connect.php');
	session_start();

	$name = $_POST['name'];
	$code = $_POST['code'];
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	$subcategory = $_POST['subcategory'];
	$image = $_FILES['image'];

	if ($image['name'] == null || $name == null || $code == null || $price == null) {
		if ($image['name'] == null && $name == null && $code == null || $price == null) {
			$_SESSION['validate_img_msg'] = "<span class='text-danger'> Photo cannot be blank. </span>";
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Item name is required. </span>";
			$_SESSION['validate_code_msg'] = "<span class='text-danger'> Item code no is required. </span>";
			$_SESSION['validate_price_msg'] = "<span class='text-danger'> Item price is required. </span>";
		}
		elseif ($name == null) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Item name is required. </span>";
		}
		elseif ($code == null) {
			$_SESSION['validate_code_msg'] = "<span class='text-danger'> Item code no is required. </span>";
		}
		elseif ($price == null) {
			$_SESSION['validate_price_msg'] = "<span class='text-danger'> Item price is required. </span>";
		}
		else {
			$_SESSION['validate_img_msg'] = "<span class='text-danger'> Photo cannot be blank. </span>";
		}
		header('location: item_new.php');
	}
	else {
		$validate_sql = "SELECT * FROM items WHERE name LIKE '%$name%'";
		$validate_stmt = $pdo->prepare($validate_sql);
		$validate_stmt->execute() or die(print_r($validate_stmt->errorInfo(), true));

		if ($validate_stmt->rowCount() > 0) {
			$_SESSION['validate_name_msg'] = "Item Name has been already EXISTED in our database.";

			header('location: item_new.php');
		}
		else {
			$source_dir = "image/item/";
			$file_name = mt_rand(100000, 999999);
			$file_exe_array = explode('.', $image['name']);
			$file_exe = $file_exe_array[1];

			$file_path = $source_dir.$file_name.'.'.$file_exe;
			move_uploaded_file($image['tmp_name'], $file_path);

			$sql = "INSERT INTO items (codeno, name, photo, price, discount, description, brand_id, subcategory_id ) VALUES (:codeno, :name, :photo, :price, :discount, :description, :brand, :subcategory)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':codeno', $code);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':photo', $file_path);
			$stmt->bindParam(':price', $price);
			$stmt->bindParam(':discount', $discount);
			$stmt->bindParam(':description', $description);
			$stmt->bindParam(':brand', $brand);
			$stmt->bindParam(':subcategory', $subcategory);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$_SESSION['success_msg'] = "One Item is <b> CREATED </b> successfully in our database.";

				header('location: item_list.php');
			}
			else {
				$_SESSION['fail_msg'] = "Sorry! Please Try again. There is a mistake in our database.";

				header('location: item_list.php');
			}
		}
	}

 ?>