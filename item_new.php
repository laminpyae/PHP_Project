<?php 
	require('backendheader.php');
	require('db_connect.php');
 ?>

 	<div class="row">
 		<div class="col-lg-10">
 			<h3 class="text-gray-800 ml-3"> Item </h3>
 		</div>
 		<div class="col-lg-2">
 			<a href="item_list.php" title="Back to Item Lists" class="btn btn-info float-right mr-3 px-3"> &raquo; </a>
 		</div>
 	</div>

	<div class="card shadow my-4">
		<div class="card-header">
			<h6 class="text-primary m-0 font-weight-bold"> Create New Item </h6>
		</div>
		<div class="card-body">
			<form action="item_add.php" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="itemName" class="col-sm-2 col-form-label"> Photo: </label>
					<div class="col-sm-10">
						<input type="file" name="image" id="">
						<?php 
						if (isset($_SESSION['validate_img_msg'])) {
							echo $_SESSION['validate_img_msg'];
							unset($_SESSION['validate_img_msg']);
						}
						 ?>
					</div>
				</div>

				<div class="form-group row">
					<label for="itemName" class="col-sm-2 col-form-label"> Name: </label>
					<div class="col-sm-10">
						<input type="text" name="name" id="itemName" class="form-control" placeholder="Enter Item Name">
						<?php 
						if (isset($_SESSION['validate_name_msg'])) {
							echo $_SESSION['validate_name_msg'];
							unset($_SESSION['validate_name_msg']);
						}
						 ?>
					</div>
				</div>

				<div class="form-group row">
					<label for="codeNo" class="col-sm-2 col-form-label"> Code No: </label>
					<div class="col-sm-10">
						<input type="text" name="code" id="codeNo" class="form-control" placeholder="Enter Item Code Number">
						<?php 
						if (isset($_SESSION['validate_code_msg'])) {
							echo $_SESSION['validate_code_msg'];
							unset($_SESSION['validate_code_msg']);
						}
						 ?>
					</div>
				</div>

				<div class="form-group row">
					<label for="price" class="col-sm-2 col-form-label"> Price: </label>
					<div class="col-sm-10">
						<input type="text" name="price" id="price" class="form-control" placeholder="Enter Item Price">
						<?php 
						if (isset($_SESSION['validate_price_msg'])) {
							echo $_SESSION['validate_price_msg'];
							unset($_SESSION['validate_price_msg']);
						}
						 ?>
					</div>
				</div>

				<div class="form-group row">
					<label for="discount" class="col-sm-2 col-form-label"> Discount: </label>
					<div class="col-sm-10">
						<input type="text" name="discount" id="discount" placeholder="Enter Item Discount" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="description" class="col-sm-2 col-form-label"> Description: </label>
					<div class="col-sm-10">
						<textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label for="brandName" class="col-sm-2 col-form-label"> Brand: </label>
					<div class="col-sm-10">
						<select name="brand" id="brandName" class="browser-default custom-select">
							<option> Choose Brand </option>
							<!-- Select data from database -->
							<?php
								$sql = "SELECT * FROM brands";
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
					</div>
				</div>

				<div class="form-group row">
					<label for="subcategoryName" class="col-sm-2 col-form-label"> Subcategory </label>
					<div class="col-sm-10">
						<select name="subcategory" id="subcategoryName" class="browser-default custom-select">
							<option> Choose Subcategory </option>
						<!-- Select data from database -->
							<?php 
								$sql = "SELECT * FROM subcategories";
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

<?php require('backendfooter.php') ?>