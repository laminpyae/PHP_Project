<?php 
	include('db_connect.php');
	include('frontend_header.php');
	session_start();

	$id = $_GET['id'];
 ?>

<div class="container" style="margin-top: 150px;">
 	<div class="row">
 		<div class="col-10">
 			<h3> Welcome <span class="text-primary text-uppercase"><?= $_SESSION['login_user']['name'] ?></span></h3>
 		</div>
 		<div class="col-2">
 			<a href="customer_order.php" class="btn btn-primary"> Back to Order List </a>
 		</div>
 	</div>
 <div class="card shadow my-4">
 	<div class="card-header">
 		<h6 class="text-secondary font-weight-bold">Your Order Details of Voucher No. <?= $id; ?> </h6>
 	</div>
 	<div class="card-body">
 		<div class="table-responsive">
 			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 				<thead>
 					<tr>
 						<th> No. </th>
 						<th> Item </th>
 						<th> Price </th>
 						<th> Qty </th>
 						<th> Subtotal </th>
 					</tr>
 				</thead>
 				<tfoot>
 					<tr>
 						<th> No. </th>
 						<th> Item </th>
 						<th> Price </th>
 						<th> Qty </th>
 						<th> Subtotal </th>
 					</tr>
 				</tfoot>
 				<tbody>
 					<!-- Selecting data from database -->
 					<?php 
 						$sql = "SELECT od.*, i.name as iname, i.price as iprice FROM orderdetails od INNER JOIN items i ON od.item_id = i.id WHERE voucherno = :voucherno";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':voucherno', $id);
						$stmt->execute();
						$rows = $stmt->fetchAll();
						$i = 1;

						foreach ($rows as $row):
						$id = $row['id'];
						$qty = $row['qty'];
						$price = $row['iprice'];
						$name = $row['iname'];
						$subtotal = $qty * $price;
						?>
						<tr>
							<td> <?= $i++ ?> </td>
							<td> <?= $name ?> </td>
							<td> <?= $price ?> </td>
							<td> <?= $qty ?> </td>
							<td> <?= $subtotal ?> </td>
						</tr>
						<?php
						endforeach;
 					 ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>

 <?php include('frontend_footer.php'); ?>