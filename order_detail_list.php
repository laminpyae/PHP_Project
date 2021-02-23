<?php 
	include('db_connect.php');
	include('backendheader.php');

	$id = $_GET['id'];
 ?>

 <div class="row">
 	<div class="col-lg-10">
 		<h3 class="text-gray-800 ml-3"> Order Details </h3>
 	</div>
 </div>

 <div class="card shadow my-4">
 	<div class="card-header">
 		<h6 class="text-primary m-0 font-weight-bold"> Order Details List </h6>
 	</div>
 	<div class="card-body">
 		<div class="table-responsive">
 			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 				<thead>
 					<tr>
 						<th> No. </th>
 						<th> Voucher No. </th>
 						<th> Quantity </th>
 						<th> Item Name </th>
 					</tr>
 				</thead>
 				<tfoot>
 					<tr>
 						<th> No. </th>
 						<th> Voucher No. </th>
 						<th> Quantity </th>
 						<th> Item Name </th>
 					</tr>
 				</tfoot>
 				<tbody>
 					<!-- Selecting data from database -->
 					<?php 
 					$sql = "SELECT od.*, i.name as iname FROM orderdetails od INNER JOIN items i ON od.item_id = i.id WHERE od.voucherno = :id";
 					$stmt = $pdo->prepare($sql);
 					$stmt->bindParam(':id', $id);
 					$stmt->execute();
 					$rows = $stmt->fetchAll();
 					$i = 1;
 					foreach ($rows as $row):
 						$id = $row['id'];
 						$voucherno = $row['voucherno'];
 						$qty = $row['qty'];
 						$item_name = $row['iname'];
 					?>
 					<tr>
 						<td> <?= $i++ ?> </td>
 						<td> <?= $voucherno ?> </td>
 						<td> <?= $qty ?> </td>
 						<td> <?= $item_name ?> </td>
 					</tr>
 					<?php
 					endforeach;
 					 ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>

 <?php include('backendfooter.php'); ?>