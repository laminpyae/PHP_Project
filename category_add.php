<?php 
	require('db_connect.php');
	session_start();

	$name = $_POST['name'];
	$image = $_FILES['image'];

	if ($image['name'] == null || $name == null) {
		if ($image['name'] == null && $name == null) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Category name is required. </span>";
			$_SESSION['validate_photo_msg'] = "<span class='text-danger'> Photo cannot be blank. </span>";
		}
		elseif ($name == null) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Category name is required. </span>";	
		}
		elseif ($image['name'] == null) {
			$_SESSION['validate_photo_msg'] = "<span class='text-danger'> Photo cannot be blank. </span>";
		}
		header('location: category_new.php');
	} 
	else {
		$validate_sql = "SELECT * FROM categories WHERE name LIKE '%$name%'";
		$validate_stmt = $pdo->prepare($validate_sql);
		$validate_stmt->execute() or die(print_r($validate_stmt->errorInfo(),true));

		if ($validate_stmt->rowCount() > 0) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Category Name has been already EXISTED in our database. </span>";

			header('location: category_new.php');
		}
		else {
			$source_dir = "image/category/";
			$file_name = mt_rand(100000, 999999);
			$file_exe_array = explode('.', $image['name']);
			$file_exe = $file_exe_array[1];

			$file_path = $source_dir.$file_name.'.'.$file_exe;
			move_uploaded_file($image['tmp_name'], $file_path);

			$sql = "INSERT INTO categories (photo, name) VALUES (:photo, :name)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':photo', $file_path);
			$stmt->bindParam(':name', $name);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$_SESSION['success_msg'] = "One Category is <b> CREATED </b> in our database.";

				header('location: category_list.php');
			}
			else {

				$_SESSION['fail_msg'] = "Sorry! Please Try again. There is something wrong with our system!";

				header('location: category_list.php');
			}
		}
	}

 ?>