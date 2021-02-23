<?php 
	require('backendheader.php');
	require('db_connect.php');
 ?>
 	<div class="row">
 		<div class="col-lg-10">
 			<h3 class="text-gray-800 ml-3">Category</h3>
 		</div>
 		<div class="col-lg-2">
 			<a href="category_new.php" title="Add New Category" class="btn-info btn float-right px-3 mr-3"> + </a>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-12">
 			<?php 
 			if (isset($_SESSION['success_msg'])) { ?>
 				<div class="alert alert-success alert-dismissible fade show" role="alert">
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> &times; </span></button>
 					<?php echo $_SESSION['success_msg']; ?>
 				</div>
 				<?php unset($_SESSION['success_msg']); ?>
 			<?php
 			}
 			 ?>
 			 <?php 
 			 if (isset($_SESSION['fail_msg'])) { ?>
 			 	<div class="alert alert-danger alert-dismissible fade show" role="alert">
 			 		<button type="button" class="close" data-dimiss="alert" aria-label="Close"><span aria-hidden="true"> &times; </span></button>
 			 		<?php echo $_SESSION['fail_msg']; ?>
 			 	</div>
 			 	<?php unset($_SESSION['fail_msg']) ?>
 			 <?php
 			 }
 			  ?>
 		</div>
 	</div>
	<div class="card shadow my-4">
		<div class="card-header py-3">
			<h6 class="text-primary m-0 font-weight-bold">Category List</h6>
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
			                   $sql = "SELECT * FROM categories ORDER BY name ASC";
			                   $stmt = $pdo->prepare($sql);
			                   $stmt->execute();
			                   $rows = $stmt->fetchAll();
			                   $i = 1;
			                   foreach ($rows as $category):
			                   	$id = $category['id'];
			                   	$name = $category['name'];
			                 ?>
			                 	<tr>
			                 		<td><?php echo $i; ?></td>
			                 		<td><?php echo $name ?></td>
			                 		<td>
			                 			<a href="category_edit.php?id=<?= $id ?>" class="btn btn-outline-warning btnedit" title="Edit"><i class="fa fa-edit"></i>  </a>
			                 			<a href="category_delete.php?id=<?= $id ?>" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i>  </a>
			                 		</td>
			                 	</tr>
			                 <?php 
			                 	$i++;
			                 endforeach;
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php require('backendfooter.php') ?>