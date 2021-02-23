<?php 
	require('db_connect.php');
	session_start();

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// $confirmPassword = $_POST['confirmPassword'];
	$address = $_POST['address'];
	$image = $_FILES['image'];
	$status = $_POST['status'];
	$role_id = "0";

	if ($name == null || $phone == null || $email == null || $password == null ||  $address == null) {
		if ($name == null && $phone == null && $email == null && $password == null && $address == null) {
			$_SESSION['validate_name_msg'] = "<span class='text-danger'> User name is require! </span>";
			$_SESSION['validate_phone_msg'] = "<span class='text-danger'> Phone number is require! </span>";
			$_SESSION['validate_email_msg'] = "<span class='text-danger'> Email is require! </span>";
			$_SESSION['validate_password_msg'] = "<span class='text-danger'> Password is require! </span>";
			// $_SESSION['validate_cpassword_msg'] = "<span class='text-danger'> Confirm Password is require!</span>";
			$_SESSION['validate_address_msg'] = "<span class='text-danger'> Address is require! </span>";
		}
		else if ($name == null) {
				$_SESSION['validate_name_msg'] = "<span class='text-danger'> User name is require! </span>";
			}
		else if ($phone == null) {
			$_SESSION['validate_phone_msg'] = "<span class='text-danger'> Phone number is require! </span>";
		}
		else if ($email == null) {
			$_SESSION['validate_email_msg'] = "<span class='text-danger'> Email is require! </span>";
		}
		else if ($password == null) {
			$_SESSION['validate_password_msg'] = "<span class='text-danger'> Password is require! </span>";
		}
		// else if ($confirmPassword == null) {
		// 	$_SESSION['validate_cpassword_msg'] = "<span class='text-danger'> Confirm Password is require!</span>";
		// }
		else {
			$_SESSION['validate_address_msg'] = "<span class='text-danger'> Address is require! </span>";
		}
		header('location: register.php');
	}
	else {
		$validate_sql = "SELECT * FROM users WHERE email LIKE '%$email%'";
		$validate_stmt = $pdo->prepare($validate_sql);
		$validate_stmt->execute() or die(print_r($validate_stmt->errorInfo(), true));

		if ($validate_stmt->rowCount() > 0) {
			$_SESSION['validate_email_msg'] = "The Email has been already EXISTED in our database.";
			header('location: register.php');
		}
		else {
			$source_dir = "image/user/";
			$file_name = mt_rand(100000, 999999);
			$file_exe_array = explode('.', $image['name']);
			$file_exe = $file_exe_array[1];

			$file_path = $source_dir.$file_name.'.'.$file_exe;
			move_uploaded_file($image['tmp_name'], $file_path);
			
			$sql = "INSERT INTO users (name, profile, email, password, phone, address, status, role_id) VALUES (:name, :profile, :email, :password, :phone, :address, :status, :role_id)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':profile', $file_path);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':address', $address);
			$stmt->bindParam(':status', $status);
			$stmt->bindParam(':role_id', $role_id);
			$stmt->execute();

			if ($stmt->rowCount()) {
				$_SESSION['success_msg'] = "<span class='text-success'> You have successfully created new account. </span>";
				header('location: login.php');
			}
			else {
				$_SESSION['fail_msg'] = "<span class='text-danger'> Sorry! Please Try again. There is something wrong with our system. </span>";
				header('location: register.php');
			}
		}
	}
 ?>