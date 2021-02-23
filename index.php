<?php 
	require 'frontend_header.php';
	require 'db_connect.php';
 ?>

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(frontend/images/banner.jpg); height: 500px">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="main_slider_content">
					<div class="red_button shop_now_button" style="background: darkorchid;"><a href="shop.php">shop now</a></div>
				</div>
			</div>
		</div>
	</div>

	<?php 
		$sql = "SELECT * FROM items LIMIT 10 OFFSET 5";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$rows = $stmt->fetchAll();


	 ?>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div>
			<!-- <div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
						</ul>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

				<?php 
					foreach ($rows as $row) {
						$id = $row['id'];
						$name = $row['name'];
						$image = $row['photo'];
						$price = $row['price'];
						$codeno = $row['codeno'];
						$discount = $row['discount'];
					?>
						<!-- Selecting Data from Database using looping -->

						<div class="product-item">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $image; ?>" class="img-fluid" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>- <?php echo $discount ?></span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $name; ?></a></h6>
									<div class="product_price"><?php echo $price; ?> MMK</div>
								</div>
							</div>
							<?php if (isset($_SESSION['login_user'])) { ?>
								<div class="red_button add_to_cart_button"><a href="javascript:void(0)" class="addtocart" data-id="<?= $id; ?>" data-name="<?= $name; ?>" data-codeno="<?= $codeno; ?>" data-photo="<?= $image; ?>" data-price="<?= $price; ?>" data-discount="<?= $discount; ?>" >add to cart</a></div>
							<?php } else { ?>
								<div class="red_button add_to_cart_button"><a href="login.php" data-toggle="tooltip" data-placement="top" title="If you want to order, you need to login to continue. Thank you.">add to cart</a></div>
							<?php } ?>
						</div>
					<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<img src="frontend/images/universal-nutrition-animal-cuts-42-pack-500x500.png" alt="">
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Deal Of The Week</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Best Sellers</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

				<?php 
					$sql = "SELECT * FROM items WHERE price < 100000 LIMIT 10";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$rows = $stmt->fetchAll();
					foreach ($rows as $row) {
						$id = $row['id'];
						$name = $row['name'];
						$image = $row['photo'];
						$price = $row['price'];
						$codeno = $row['codeno'];
						$discount = $row['discount'];
					?>
						<!-- Selecting Data from Database using looping -->

						<div class="product-item">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $image; ?>" class="img-fluid" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>- <?php echo $discount ?></span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $name; ?></a></h6>
									<div class="product_price"><?php echo $price; ?> MMK</div>
								</div>
							</div>
							<?php if (isset($_SESSION['login_user'])) { ?>
								<div class="red_button add_to_cart_button"><a href="javascript:void(0)" class="addtocart" data-id="<?= $id; ?>" data-name="<?= $name; ?>" data-codeno="<?= $codeno; ?>" data-photo="<?= $image; ?>" data-price="<?= $price; ?>" data-discount="<?= $discount; ?>" >add to cart</a></div>
							<?php } else { ?>
								<div class="red_button add_to_cart_button"><a href="login.php" data-toggle="tooltip" data-placement="top" title="If you want to order, you need to login to continue. Thank you.">add to cart</a></div>
							<?php } ?>
						</div>
					<?php
						}
					?>
					</div>
				</div>
			</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>free shipping</h6>
							<p>Suffered Alteration in Some Form</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cach on delivery</h6>
							<p>The Internet Tend To Repeat</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 days return</h6>
							<p>Making it Look Like Readable</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all week</h6>
							<p>8AM - 09PM</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 
	require 'frontend_footer.php';
 ?>