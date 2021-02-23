<?php 
	include('db_connect.php');
	require('backendheader.php');

	// get the id from address bar
	$id = $_GET['id'];

	//draw out the query from the db
	$sql = "SELECT * FROM categories WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
 	<div class="row">
 		<div class="col-sm-10">
 			<h3 class="text-gray-800 ml-3"> Category </h3>
 		</div>
 		<div class="col-sm-2">
 			<a href="category_list.php" title="Back to Category Lists" class="btn btn-info float-right mr-3 px-3"> &laquo; </a>
 		</div>
 	</div>
 	<div class="card shadow my-4">
 		<div class="card-header py-3">
 			<h6 class="font-weight-bold text-primary m-0"> Category Edit </h6>
 		</div>
 		<div class="card-body">
 			<form action="category_update.php" method="POST" enctype="multipart/form-data">
 				<input type="hidden" name="id" value="<?= $row['id'] ?>">
 				<input type="hidden" name="oldphoto" value="<?= $row['photo'] ?>">

 				<div class="form-group row">
 					<label for="categoryName" class="col-sm-2 col-form-label"> Photo: </label>
 					<div class="col-sm-10">
 						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="oldphoto-tab" data-toggle="tab" href="#oldphoto" role="tab" aria-controls="oldphoto"
						      aria-selected="true"> Old Photo </a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="newphoto-tab" data-toggle="tab" href="#newphoto" role="tab" aria-controls="newphoto"
						      aria-selected="false"> New Photo </a>
						  </li>
						</ul>
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="oldphoto" role="tabpanel" aria-labelledby="oldphoto-tab">
						  	<img src="<?= $row['photo']; ?>" class="img-fluid mt-2" style="width: 120px; height: 120px;" alt="">
						  </div>
						   <div class="tab-pane fade show" id="newphoto" role="tabpanel" aria-labelledby="newphoto-tab">
						  	<input type="file" class="form-control-file mt-2" name="image" id="">
						  </div>
						</div>
 					</div>
 				</div>

 				<div class="form-group row">
 					<label for="categoryName" class="col-sm-2 col-form-label"> Name: </label>
 					<div class="col-sm-10">
 						<input type="text" name="name" id="categoryName" class="form-control" placeholder="Enter Category Name" value="<?= $row['name'] ?>">
 					</div>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-2"></div>
 					<div class="col-sm-10">
 						<button type="submit" class="btn btn-info">
 							<i class="fa fa-upload"></i> Update
 						</button>
 					</div>
 				</div>
 			</form>
 		</div>
 	</div>

 <?php require('backendfooter.php') ?>