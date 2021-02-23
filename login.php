<?php 
	require('frontend_header.php');
?>
	<div class="container bg-white border rounded shadow col-4" style="margin-top: 150px;">
		<?php if (isset($_SESSION['success_msg'])) {
			echo $_SESSION['success_msg'];
			unset($_SESSION['success_msg']);
		} ?>

		<?php if (isset($_SESSION['fail_msg'])) {
			echo $_SESSION['fail_msg'];
			unset($_SESSION['fail_msg']);
		} ?>
		<form action="signin.php" method="POST">
			<h3 class="bg-primary text-white text-center mt-3 py-2"> Login Form: </h3>
			<hr>

			<div class="form-group row mt-3">
				<label for="userEmail" class="col-form-label col-sm-2"> Email: </label>
				<div class="col-sm-10">
					<input type="email" name="email" id="userEmail" class="form-control">
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for="password" class="col-form-label col-sm-2"> Password: </label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control">
				</div>
			</div>

			<div class="form-group row mt-1">
				<div class="col-sm-2"></div>
				<div class="custom-control custom-checkbox col-sm-10">
					<input type="checkbox" id="rememberPasswordCheck" class="custom-control-input">
					<label for="rememberPasswordCheck" class="custom-control-label"> Remember Password </label>
				</div>
			</div>

			<div class="form-group row my-3">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success"> Login </button> | &nbsp;
					<a href="register.php" class="text-decoration-none"> Don't have an account? Can register here. </a>
				</div>
			</div>

		</form>
	</div>
<?php require('frontend_footer.php'); ?>