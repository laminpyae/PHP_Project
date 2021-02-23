<?php 
	include('db_connect.php');
	include('frontend_header.php');
	session_start();

	$id = $_SESSION['login_user']['id'];

 ?>
 <div class="container" style="margin-top: 150px;">
 	<div class="row">
 		<div class="col-10">
 			<h3> Welcome <span class="text-primary text-uppercase"><?= $_SESSION['login_user']['name'] ?></span></h3>
 		</div>
 	</div>
 	<div class="card shadow my-4">
 		<div class="card-header">
 			<h5 class="text-secondary font-weight-bold"> Your Order Lists: </h5>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th> No. </th>
 							<th> Order Date </th>
 							<th> Voucher No. </th>
 							<th> Total </th>
 							<th> Status </th>
 							<th> Order Details </th>
 						</tr>
 					</thead>
 					<tfoot>
 						<tr>
 							<th> No. </th>
 							<th> Order Date </th>
 							<th> Voucher No. </th>
 							<th> Total </th>
 							<th> Status </th>
 							<th> Order Details </th>
 						</tr>
 					</tfoot>
 					<tbody>
 						<!-- Selecting data from database -->
 						<?php 
 						$sql = "SELECT * FROM orders WHERE orders.user_id = :id";
 						$stmt = $pdo->prepare($sql);
 						$stmt->bindParam(':id', $id);
 						$stmt->execute();
 						$rows = $stmt->fetchAll();
 						$i = 1;

 					foreach ($rows as $row):
 						$id = $row['id'];
 						$orderdate = $row['orderdate'];
 						$voucherno = $row['voucherno'];
 						$total = $row['total'];
 						$status = $row['status'];
 						?>
 						<tr>
 							<td> <?= $i++ ?> </td>
 							<td> <?= $orderdate ?> </td>
 							<td> <?= $voucherno ?> </td>
 							<td> <?= $total ?> MMK </td>
 							<td> 
 								<?php if ($status == 0) {
 									echo "Pending";
 								} else {
 									echo "Delivered";
 								} ?>
 							</td>
 							<td>
 								<a href="customer_orderdetail.php?id=<?= $row['voucherno'] ?>" class="btn btn-primary"> More </a>
 							</td>
 						</tr>
 						<?php
 					endforeach;
 						 ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>
 </div>


 <?php include('frontend_footer.php'); ?>