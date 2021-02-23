<?php 
	require('db_connect.php');
	session_start();

	$name = $_POST['name'];
	$category = $_POST['category'];

	if ($name == null || $category == "NULL") {
		if ($name == null && $category == "NULL") {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Subcategory name is required. </span>";
			$_SESSION['validate_cat_msg'] = "<span class='text-danger'> Required to choose Category. </span>";
		}
		elseif ($name == null) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> Subcategory name is required. </span>";
		}
		else {
			$_SESSION['validate_cat_msg'] = "<span class='text-danger'> Required to choose Category. </span>";
		}
		header('location: subcategory_new.php');
	}
	else {
		$validate_sql = "SELECT * FROM subcategories WHERE name LIKE '%$name%'";
		$validate_stmt = $pdo->prepare($validate_sql);
		$validate_stmt->execute() or die(print_r($validate_stmt->errorInfo(), true));

		if ($validate_stmt->rowCount() > 0) {
			$_SESSION['validate_name_msg'] = "Subcategory Name is already EXISTED in our database.";
			header('location: subcategory_new.php');
		}
		else {
			$sql = "INSERT INTO subcategories (name, category_id) VALUES (:name, :category)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':category', $category);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$_SESSION['success_msg'] = "One Subcategory is <b> CREATED </b> successfully in our database.";
				header('location: subcategory_list.php');
			}
			else {
				$_SESSION['fail_msg'] = "Sorry! Please Try again. There is a mistake in our system!";
				header('location: subcategory_list.php');
			}
		}
	}
 ?>
