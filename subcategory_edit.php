<?php 
	include('db_connect.php');
	require('backendheader.php');

	//get the id from address bar
	$id = $_GET['id'];

	//draw out the query from db
	$sql = "SELECT * FROM subcategories WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>

 <div class="row">
 	<div class="col-lg-10">
 		<h3 class="text-gray-800 ml-3"> Subcategory </h3>
 	</div>
 	<div class="col-lg-2">
 		<a href="subcategory_list.php" title="Back to Subcategory Lists" class="btn btn-info float-right mr-3 px-3"> &laquo; </a>
 	</div>
 </div>
 <div class="card shadow my-4">
 	<div class="card-header">
 		<h6 class="text-primary m-0 font-weight-bold"> Subcategory Edit </h6>
 	</div>
 	<div class="card-body">
 		<form action="subcategory_update.php" method="POST" enctype="multipart/form-data">
 			<input type="hidden" name="id" value="<?= $row['id'] ?>">

 			<div class="form-group row">
 				<label for="subcategoryName" class="col-sm-2 col-form-label"> Name: </label>
 				<div class="col-sm-10">
 					<input type="text" name="name" id="subcategoryName" class="form-control" value="<?= $row['name'] ?>">
 				</div>
 			</div>

 			<div class="form-group row">
 				<div class="col-sm-2"></div>
 				<div class="col-sm-10">
 					<button type="submit" class="btn btn-info">
 						<i class="fas fa-upload"></i> Update
 					</button>
 				</div>
 			</div>
 		</form>
 	</div>
 </div>

 <?php require('backendfooter.php') ?>