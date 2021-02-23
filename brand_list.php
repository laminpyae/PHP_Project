<?php 
	require('db_connect.php');
	require('backendheader.php');
 ?>

 	<div class="row">
 		<div class="col-lg-10">
 			<h3 class="text-gray-800 ml-3"> Brand </h3>
 		</div>
 		<div class="col-lg-2">
 			<a href="brand_new.php" class="btn btn-info px-3 mr-3 float-right"> + </a>
 		</div>
 	</div>

 	<div class="row">
 		<div class="col-12">
 			<?php if (isset($_SESSION['success_msg'])) { ?>
 				<div class="alert alert-success alert-dismissible fade show" role="alert">
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 						<span aria-hidden="true"> &times; </span>
 					</button>
 					<?= $_SESSION['success_msg'] ?>
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
 			<h6 class="text-primary m-0 font-weight-bold">Brand List</h6>
 		</div>
 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th> No. </th>
 							<th> Name </th>
 							<th> Action </th>
 						</tr>
 					</thead>
 					<tfoot>
 						<tr>
 							<th> No. </th>
 							<th> Name </th>
 							<th> Action </th>
 						</tr>
 					</tfoot>
 					<tbody>
 						<!-- Selecting data from database -->
 						<?php 
 						 $sql = "SELECT * FROM brands ORDER BY name ASC";
 						 $stmt = $pdo->prepare($sql);
 						 $stmt->execute();
 						 $rows = $stmt->fetchAll();
 						 $i = 1;
 						 foreach ($rows as $brand):
 						 	$id = $brand['id'];
 						 	$name = $brand['name'];
 						?>
 						<tr>
 							<td> <?= $i++; ?> </td>
 							<td> <?= $name; ?> </td>
 							<td>
 								<a href="brand_edit.php?id=<?= $id ?>" title="Edit" class="btn btn-outline-warning btnedit"><i class="fa fa-edit"></i></a>
 								<a href="brand_delete.php?id=<?= $id ?>" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
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

 <?php require('backendfooter.php') ?>