<?php 
	include('backendheader.php');
	include('db_connect.php');
 ?>

<div class="row">
	<div class="col-lg-10">
		<h3 class="text-gray-800 ml-3"> Order </h3>
	</div>
</div>

<div class="card shadow my-4">
	<div class="card-header">
		<h6 class="text-primary m-0 font-weight-bold"> Order List </h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th> No. </th>
						<th> OrderDate </th>
						<th> Voucher No. </th>
						<th> Total </th>
						<th> Note </th>
						<th> Customer Name</th>
						<th> Order Details</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th> No. </th>
						<th> OrderDate </th>
						<th> Voucher No. </th>
						<th> Total </th>
						<th> Note </th>
						<th> Customer Name</th>
						<th> Order Details</th>
					</tr>
				</tfoot>
				<tbody>
					<!-- Selecting data from database -->
					<?php 
					$sql = "SELECT o.*, u.name as uname FROM orders o INNER JOIN users u ON o.user_id = u.id";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$rows = $stmt->fetchAll();
					$i = 1;
					foreach($rows as $order):
						$id = $order['id'];
						$orderdate = $order['orderdate'];
						$voucherno = $order['voucherno'];
						$total = $order['total'];
						$note = $order['note'];
						$user_name = $order['uname'];
					?>
					<tr>
						<td> <?= $i++ ?> </td>
						<td> <?= $orderdate ?> </td>
						<td> <?= $voucherno ?> </td>
						<td> <?= $total ?> </td>
						<td> <?= $note ?> </td>
						<td> <?= $user_name ?> </td>
						<td>
							<a href="order_detail_list.php?id=<?= $voucherno ?>" class="btn btn-primary"> Go to Order details </a>
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

<?php include('backendfooter.php'); ?>