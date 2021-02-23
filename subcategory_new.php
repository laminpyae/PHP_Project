<?php 
	require('db_connect.php');
	require('backendheader.php');
 ?>

 <div class="row">
 	<div class="col-lg-10">
 		<h3 class="text-gray-800 ml-3"> Subcategory </h3>
 	</div>
 	<div class="col-lg-2">
 		<a href="subcategory_list.php" title="Back to Subcategory Lists" class="btn btn-info float-right mr-3 px-3"> &raquo; </a>
 	</div>
 </div>

 <div class="card shadow my-4">
 	<div class="card-header">
 		<h6 class="font-weight-bold m-0 text-primary"> Create New Subcategory </h6>
 	</div>
 	<div class="card-body">
 		<form action="subcategory_add.php" method="POST" enctype="multipart/form-data">
 			<div class="form-group row">
 				<label for="subcategoryName" class="col-sm-2 col-form-label"> Name: </label>
 				<div class="col-sm-10">
 					<input type="text" name="name" id="subcategoryName" class="form-control" placeholder="Enter Subcategory Name">
 					<?php 
 						if (isset($_SESSION['validate_name_msg'])) {
 							echo $_SESSION['validate_name_msg'];
 							unset($_SESSION['validate_name_msg']);
 						}
 					 ?>
 				</div>
 			</div>

 			<div class="form-group row">
 				<label for="categoryName" class="col-sm-2 col-form-label"> Category: </label>
 				<div class="col-sm-10">
 					<select name="category" id="categoryName" class="browser-default custom-select">
 						<option value="NULL"> Choose Category </option>
 						<!-- Select data from database -->
 						<?php 
 						$sql = "SELECT * FROM categories";
 						$stmt = $pdo->prepare($sql);
 						$stmt->execute();

 						$rows = $stmt->fetchAll();
 						foreach ($rows as $row) {
 							$id = $row['id'];
 							$name = $row['name'];
 						?>
 						<option value="<?= $id ?>"> <?= $name ?> </option>
 						<?php
 						}
 						 ?>
 					</select>
 					<?php 
 						if (isset($_SESSION['validate_cat_msg'])) {
 							echo $_SESSION['validate_cat_msg'];
 							unset($_SESSION['validate_cat_msg']);
 						}
 					 ?>
 				</div>
 			</div>

 			<div class="form-group row">
 				<div class="col-sm-2"></div>
 				<div class="col-sm-10">
 					<button type="submit" class="btn btn-info">
 						<i class="fa fa-save"></i> Save
 					</button>
 				</div>
 			</div>
 		</form>
 	</div>
 </div>

 <?php require('backendfooter.php'); ?>