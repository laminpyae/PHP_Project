<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>International Nutrition</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="International Nutrition">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="frontend/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/bootstrap4/bootstrap.min.css">
<link href="frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="frontend/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/responsive.css">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all orders over 100,000 MMK</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										MMK <img src="frontend/images/myan_logo.png" width="20px" height="20px" class="ml-2">
									</a>
								</li>
	

								<?php if (isset($_SESSION['login_user'])) {
								?>
									<li class="account">
									<a href="#">
										<?= $_SESSION['login_user']['name']?> &nbsp;
										<img src="<?= $_SESSION['login_user']['profile']?>" class="img-profile" width="20px" height="20px" alt="">
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="customer_order.php?id=<?= $_SESSION['login_user']['id'] ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Order</a></li>
										<li><a href="signout.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Log Out</a></li>
									</ul>
								</li>

								<?php } else { ?>
								
								<li class="account">
									<a href="register.php">
										Create Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="register.php"><i class="fas fa-user-plus" aria-hidden="true"></i>Sign Up</a></li>
										<li><a href="login.php"><i class="fas fa-address-book" aria-hidden="true"></i>Log In</a></li>
									</ul>
								</li>

							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="index.php">International<span class="text-danger">Nutrition</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">home</a></li>
								<li><a href="shop.php">shop</a></li>
								<li><a href="blog.php">blog</a></li>
								<li><a href="contact.php">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<?php if (isset($_SESSION['login_user'])) { ?>
										<a href="checkout.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items cartnoti"></span>
										</a>
									<?php } else { ?>
										<a href="login.php" title="If you want to order, you need to login to continue. Thank you.">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items"></span>
										</a>
									<?php } ?>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						mmk
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">usd</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li>
				
				</li>
				<li class="menu_item"><a href="#">home</a></li>
				<li class="menu_item"><a href="#">shop</a></li>
				<li class="menu_item"><a href="#">promotion</a></li>
				<li class="menu_item"><a href="#">pages</a></li>
				<li class="menu_item"><a href="#">blog</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>