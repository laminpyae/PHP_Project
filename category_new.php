<?php 
	require ('backendheader.php');
 ?>
	<div class="row">
		<div class="col-lg-10">
			<h3 class="text-gray-800 ml-3">Category</h3>
		</div>
		<div class="col-lg-2">
			<a href="category_list.php" title="Back to Category Lists" class="btn btn-info float-right px-3 mr-3">&raquo;</a>
		</div>
	</div>
	<div class="card shadow my-4">
		<div class="card-header py-3">
			<h6 class="text-primary m-0 font-weight-bold">Create New Category</h6>
		</div>
		<div class="card-body">
			<form action="category_add.php" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label">Photo:</label>
					<div class="col-sm-10">
						<input type="file" name="image">
						<?php 
							if (isset($_SESSION['validate_photo_msg'])) {
								echo $_SESSION['validate_photo_msg'];
								unset($_SESSION['validate_photo_msg']);
							}
						 ?>
					</div>
				</div>
			
				<div class="form-group row">
					<label for="categoryName" class="col-sm-2 col-form-label">Name:</label>
					<div class="col-sm-10">
						<input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter Category Name">
						<?php 
							if (isset($_SESSION['validate_name_msg'])) {
								echo $_SESSION['validate_name_msg'];
								unset($_SESSION['validate_name_msg']);
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