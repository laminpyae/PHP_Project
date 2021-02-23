<?php 
require('db_connect.php');
require('backendheader.php');

$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC); //get only selected data

	$id = $row['id'];
	$name = $row['name'];
	$codeno = $row['codeno'];
	$photo = $row['photo'];
	$price = $row['price'];
	$discount = $row['discount'];
	$description = $row['description'];
	$brand_id = $row['brand_id'];
	$subcategory_id = $row['subcategory_id'];
	?>
	<div class="row">
		<div class="col-lg-10">
			<h3 class="text-gray-800 ml-3"> Item </h3>
		</div>
		<div class="col-lg-2">
			<a href="item_list.php" title="Back to Item List" class="btn btn-info float-right mr-3 px-3"> + </a>
		</div>
	</div>
	<div class="card shadow my-4">
		<div class="card-header">
			<h6 class="text-primary m-0 font-weight-bold"> Edit Item </h6>
		</div>
		<div class="card-body">
			<form action="item_update.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $id ?>">
				<input type="hidden" name="oldphoto" value="<?= $photo ?>">

				<div class="form-group row">
					<label for="itemName" class="col-sm-2 col-form-label"> Photo: </label>
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
					<label for="itemName" class="col-sm-2 col-form-label"> Name: </label>
					<div class="col-sm-10">
						<input type="text" name="name" id="itemName" value="<?= $row['name'] ?>" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="itemCode" class="col-sm-2 col-form-label"> Codeno: </label>
					<div class="col-sm-10">
						<input type="text" name="codeno" id="itemCode" value="<?= $row['codeno'] ?>" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="itemPrice" class="col-sm-2 col-form-label"> Price: </label>
					<div class="col-sm-10">
						<input type="text" name="price" id="itemPrice" value="<?= $row['price'] ?>" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="itemDiscount" class="col-sm-2 col-form-label"> Discount: </label>
					<div class="col-sm-10">
						<input type="text" name="discount" id="itemDiscount" value="<?= $row['discount'] ?>" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="itemDescription" class="col-sm-2 col-form-label"> Description: </label>
					<div class="col-sm-10">
						<input type="text" name="description" id="itemDescription" value="<?= $row['description'] ?>" class="form-control">
					</div>
				</div>

				<div class="form-group row">
					<label for="itemBrand" class="col-sm-2 col-form-label"> Brand: </label>
					<div class="col-sm-10">
						<select name="brand" id="itemBrand" class="browser-default custom-select">
							<?php 
							$sql = "SELECT * FROM brands";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$rows = $stmt->fetchAll();

							foreach ($rows as $brand) {
								$bid = $brand['id'];
								$bname = $brand['name'];
								?>
								<option value="<?= $bid ?>" <?php if ($bid == $brand_id) echo "selected"; ?>>
									<?php echo $bname; ?>
								</option>
								<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="itemSubcategory" class="col-sm-2 col-form-label"> Subcategory: </label>
					<div class="col-sm-10">
						<select name="subcategory" id="itemSubcategory" class="browser-default custom-select">
							<?php 
							$sql = "SELECT * FROM subcategories";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$rows = $stmt->fetchAll();
							foreach ($rows as $subcategory) {
								$sid = $subcategory['id'];
								$sname = $subcategory['name'];
							?>
							<option value="<?= $sid ?>" <?php if ($sid == $subcategory_id) {
								echo "selected";
							} ?>><?php echo $sname; ?></option>
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
							<i class="fas fa-upload"></i> Update
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>

	<?php require('backendfooter.php') ?>