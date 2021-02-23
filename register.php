<?php 
	include('frontend_header.php');
?>
	<div class="container border col-6 shadow bg-white rounded" style="margin-top: 150px;">
		<form action="signup.php" method="POST" enctype="multipart/form-data">
			<h3 class="bg-primary text-white text-center mt-3 py-2"> Please kindly fill up the form: </h3>
			<hr>

			<div class="form-group row mt-3">
				<label for="name" class="col-sm-2 col-form-label"> Username: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control text-dark" name="name" id="name" placeholder="Please Enter Username">
					<?php 
					if (isset($_SESSION['validate_name_msg'])) {
						echo $_SESSION['validate_name_msg'];
						unset($_SESSION['validate_name_msg']);
					}
					 ?>
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for="profile" class="col-sm-2 col-form-label"> Profile: </label>
				<div class="col-sm-10">
					<input type="file" name="image" id="profile">
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for="phone" class="col-sm-2 col-form-label"> Phone: </label>
				<div class="col-sm-10">
					<input type="number" name="phone" id="phone" class="form-control text-dark" placeholder="Please Enter Phone Number">
					<?php 
					if (isset($_SESSION['validate_phone_msg'])) {
						echo $_SESSION['validate_phone_msg'];
						unset($_SESSION['validate_phone_msg']);
					}
					 ?>
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for="email" class="col-sm-2 col-form-label"> Email: </label>
				<div class="col-sm-10">
					<input type="email" name="email" id="email" class="form-control text-dark" placeholder="Please Enter Email Addess" aria-describedby="emailHelp">
					<?php 
					if (isset($_SESSION['validate_email_msg'])) {
						echo $_SESSION['validate_email_msg'];
						unset($_SESSION['validate_email_msg']);
					}
					 ?>
				</div>
			</div>

			<div class="form-group row mt-3">
				<label for="password" class="col-sm-2 col-form-label"> Password: </label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control text-dark" placeholder="Please Enter Password">
					<?php 
					if (isset($_SESSION['validate_password_msg'])) {
						echo $_SESSION['validate_password_msg'];
						unset($_SESSION['validate_password_msg']);
					}
					 ?>
					<font id="error" color="red"></font>
				</div>
			</div>

		<!-- 	<div class="form-group row mt-3">
				<label for="confirmPassword" class="col-sm-2 col-form-label"> Confirm Password: </label>
				<div class="col-sm-10">
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control text-dark" placeholder="Please Confirm your Password">
					<?php 
					if (isset($_SESSION['validate_cpassword_msg'])) {
						echo $_SESSION['validate_cpassword_msg'];
						unset($_SESSION['validate_cpassword_msg']);
					}
					 ?>
					<font id="cerror" color="red"></font>
				</div>
			</div> -->

			<div class="form-group row mt-3">
				<label for="address" class="col-sm-2 col-form-label"> Address: </label>
				<div class="col-sm-10">
					<textarea name="address" id="address" cols="30" rows="5" class="form-control text-dark"></textarea>
					<?php 
					if (isset($_SESSION['validate_address_msg'])) {
						echo $_SESSION['validate_address_msg'];
						unset($_SESSION['validate_address_msg']);
					}
					 ?>
				</div>
			</div>

			<div class="form-group row my-4">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success" style="cursor: pointer;"> Create Account </button> | &nbsp;
					<a href="login.php" class="text-decoration none"> Already have an account? Login</a>
				</div>
			</div>

			<!-- Carry Status Value -->
			<div class="form-group row">
				<input type="hidden" name="status" value="0">
			</div>
		</form>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {

			$('#password').change(function() {
				var password = $(this).val();
				if (password.length > 8) {
					$('#error').html('<span class="text-danger"> Password should not exceed eight digit.</span>');
				}
			})

			$('#confirmPassword').change(function() {
				var cpassword = $(this).val();
				var password = $('#password').val();
				if (password!=cpassword) {
					$('#cerror').html("<span class='text-danger'> Confirm Password does not match!</span>");
				}
			})
		})
	</script>

<?php include('frontend_footer.php'); ?>