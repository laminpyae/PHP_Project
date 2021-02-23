<?php 
	require('db_connect.php');
	session_start();

	$cart = $_POST['cart'];
	$note = $_POST['note'];
	$total = $_POST['total'];

	date_default_timezone_set('Asia/Rangoon');

	//voucher
	$voucher_no = strtotime(date("h:i:s"));

	//order date
	$order_date = date('Y-m-d');

	//user id
	$user_id = $_SESSION['login_user']['id'];

	//status
	$status = "Ordered";

	//ORDER DETAILS
	foreach ($cart as $key => $value) {
		$id = $value['id'];
		$qty = $value['qty'];

		$orderdetail_sql = "INSERT INTO orderdetails (voucherno, qty, item_id) VALUES (:voucherno, :qty, :item_id)";
		$orderdetail_stmt = $pdo->prepare($orderdetail_sql);
		$orderdetail_stmt->bindParam(':voucherno', $voucher_no);
		$orderdetail_stmt->bindParam(':item_id', $id);
		$orderdetail_stmt->bindParam(':qty', $qty);
		$orderdetail_stmt->execute();
	}

	//ORDERS
	$order_sql = "INSERT INTO orders (orderdate, voucherno, total, note, status,  user_id) VALUES (:orderdate, :voucherno, :total, :note, :status, :user_id)";
	$order_stmt = $pdo->prepare($order_sql);
	$order_stmt->bindParam(':orderdate', $order_date);
	$order_stmt->bindParam(':voucherno', $voucher_no);
	$order_stmt->bindParam(':total', $total);
	$order_stmt->bindParam(':note', $note);
	$order_stmt->bindParam(':status', $status);
	$order_stmt->bindParam(':user_id', $user_id);
	$order_stmt->execute();
 ?>