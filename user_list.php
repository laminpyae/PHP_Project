<?php 
	include('db_connect.php');
	include('backendheader.php');
 ?>

 <div class="row">
 	<div class="col-lg-10">
 		<h3 class="text-gray-800 ml-3"> User </h3>
 	</div>
 </div>

 <div class="card shadow my-4">
 	<div class="card-header">
 		<h6 class="font-weight-bold m-0 text-primary"> User List </h6>
 	</div>
 	<div class="card-body">
 		<div class="table-responsive">
 			<table class="table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
 				<thead>
 					<tr>
 						<th> No. </th>
 						<th> Name </th>
 						<th> Profile </th>
 						<th> Email </th>
 						<th> Phone </th>
 						<th> Address </th>
 						<th> Status </th>
 						<th> Role </th>
 					</tr>
 				</thead>
 				<tfoot>
 					<tr>
 						<th> No. </th>
 						<th> Name </th>
 						<th> Profile </th>
 						<th> Email </th>
 						<th> Phone </th>
 						<th> Address </th>
 						<th> Status </th>
 						<th> Role </th>
 					</tr>
 				</tfoot>
 				<tbody>
 					<!-- Selecting data from database -->
 					<?php 
 					$sql = "SELECT u.*, r.name as rname FROM users u INNER JOIN roles r ON u.role_id = r.id";
 					$stmt = $pdo->prepare($sql);
 					$stmt->execute();
 					$rows = $stmt->fetchAll();
 					$i = 1;
 					foreach ($rows as $user):
 					?>
 					<tr>
 						<td> <?= $i++ ?> </td>
 						<td> <?= $user['name'] ?> </td>
 						<td> <img src="<?= $user['profile'] ?>" width="100px" height="100px" alt=""> </td>
 						<td> <?= $user['email'] ?> </td>
 						<td> <?= $user['phone'] ?> </td>
 						<td> <?= $user['address'] ?> </td>
 						<td> <?= $user['status'] ?> </td>
 						<td> <?= $user['rname'] ?> </td>
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