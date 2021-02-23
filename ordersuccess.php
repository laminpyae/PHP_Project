<?php 
require 'frontend_header.php';
?>

<div class="container">
	<div class="row">
		<nav class="navbar navbar-expand navbar-light bg-light col-12 rounded" style="margin-top: 200px;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-primary" href="index.php">Home <span class="text-dark">/</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Shopping Cart /</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link disabled" href="#">Check Out /</a>
					</li>
					<li class="nav-item"> 
						<a class="nav-link disabled" href="#">Success /</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Content Section -->

		<h2 class="text-center text-success col-12 mt-5">Thank you for the order</h2>
		<p class="mt-5 text-center col-12">You can always track your order in the "My Order" section under profile.</p>
		<p class="mt-3 text-center col-12">Your order will be delivered in 4 days.</p>
	</div>
</div>

<?php 
require 'frontend_footer.php';
?>