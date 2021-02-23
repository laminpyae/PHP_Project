<?php 
	require('db_connect.php');
	require('backendheader.php');
 ?>

 	<div class="row">
 		<div class="col-lg-10">
 			<h3 class="text-gray-800 ml-3"> Item </h3>
 		</div>
 		<div class="col-lg-2">
 			<a href="item_new.php" title="Add New Item" class="btn btn-info float-right mr-3 px-3"> + </a>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-12">
 			<?php if (isset($_SESSION['success_msg'])) { ?>
 				<div class="alert alert-success alert-dismissible fade show" role="alert">
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 						<span aria-hidden="true"> &times; </span>
 					</button>
 					<?= $_SESSION['success_msg']; ?>
 				</div>
 				<?php unset($_SESSION['success_msg']); ?>
 			<?php
 			} ?>

 			<?php if (isset($_SESSION['fail_msg'])) { ?>
 				<div class="alert alert-danger alert-dismissible fade show" role="alert">
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 						<span aria-hidden="true"> &times; </span>
 					</button>
 					<?= $_SESSION['fail_msg'] ?>
 				</div>
 				<?php unset($_SESSION['fail_msg']); ?>
 			<?php
 			} ?>
 		</div>
 	</div>
 	<div class="card shadow my-4">
 		<div class="card-header">
 			<h6 class="text-primary m-0 font-weight-bold"> Item List </h6>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th> No. </th>
 							<th> Name </th>
 							<th> Codeno </th>
 							<th> Photo </th>
 							<th> Price </th>
 							<th> Discount </th>
 							<th> Description </th>
 							<th> Brand </th>
 							<th> Subcategory </th>
 							<th> Action </th>
 						</tr>
 					</thead>
 					<tfoot>
 						<tr>
 							<th> No. </th>
 							<th> Name </th>
 							<th> Codeno </th>
 							<th> Photo </th>
 							<th> Price </th>
 							<th> Discount </th>
 							<th> Description </th>
 							<th> Brand </th>
 							<th> Subcategory </th>
 							<th> Action </th>
 						</tr>
 					</tfoot>
 					<tbody>
 						<?php 
 						$sql = "SELECT i.*, b.name as bname, s.name as sname FROM items i INNER JOIN brands b ON i.brand_id = b.id INNER JOIN subcategories s ON i.subcategory_id = s.id ORDER BY id DESC";
 						$stmt = $pdo->prepare($sql);
 						$stmt->execute();
 						$rows = $stmt->fetchAll();
 						$i = 1;

 						foreach ($rows as $row) {
 							$id = $row['id'];
 							$name = $row['name'];
 							$code = $row['codeno'];
 							$photo = $row['photo'];
 							$price = $row['price'];
 							$discount = $row['discount'];
 							$description = $row['description'];
 							$brand = $row['bname'];
 							$subcategory = $row['sname'];
 						?>
 						<tr>
 							<td> <?= $i++ ?> </td>
 							<td> <?= $name ?> </td>
 							<td> <?= $code ?> </td>
 							<td> <img src="<?= $photo ?>" width="100px" height="100px" class="img-fluid"> </td>
 							<td> <?= $price ?> </td>
 							<td> <?= $discount ?> </td>
 							<td> <?= $description ?> </td>
 							<td> <?= $brand ?> </td>
 							<td> <?= $subcategory ?> </td>
 							<td>
 								<a href="item_edit.php?id=<?=$id?>" title="Edit" class="btn btn-outline-warning btnedit"><i class="fas fa-edit"></i></a>
 								<a href="item_delete.php?id=<?=$id?>" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></a>
 							</td>
 						</tr>
 						<?php
 						}
 						 ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>

 <?php require('backendfooter.php') ?>