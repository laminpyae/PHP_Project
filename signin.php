<?php 
	include('db_connect.php');
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email = :email AND password = :password";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->execute();

	// var_dump($stmt->rowCount()); die();
	if ($stmt->rowCount() >= 1) {
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$_SESSION['login_user'] = $user;
		// var_dump($user);
		$status = $user['status'];
		$role_id = $user['role_id'];

		if ($status != 0) {
			echo "Your account has been supspended! Please contact our customer care.";
		}
		else {
			if ($role_id == 1) {
				header('location: category_list.php');
			}
			else {
				header('location: index.php');
			}	
		}
	}
 ?>