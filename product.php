<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Products Bella Beauty Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- Animate.css -->
	<link rel="stylesheet" href="./css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="./css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="./css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="./css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
	<link rel="stylesheet" href="./css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="./css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<style>
		a.disabled {
			pointer-events: none;
			color: #ccc;
		}
	</style>
</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<?php include "Page/nav_header.php"; ?>

		<div id="fh5co-product">
			<div class="container">
				<div class="row">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<span>Cool Stuff</span>
							<h2>Products.</h2>
							<p>“What you do, the way you think, makes you beautiful.” </p>
							<p>― Scott Westerfeld, Uglies</p>
						</div>
					</div>
					
					<form action="product.php" method="POST">
						<div class="row form-group">
							<div class="col-sm-3 form-group">
								<label class="">Search</label>
								<input type="text" name="findtext" class="col-sm-4 form-control" value="<?= $_POST['findtext'] ?>">
							</div>
							<div class="col-sm-3 form-group">
								<label class="">Category</label>
								<input class="col-sm-4 form-control"  name="findcat" list="findcat">
									<datalist id="findcat">
									<option value="Brushes">Brushes</option>
									<option value="Foundation">Foundation</option>
									<option value="Lipstick">Lipstick</option>
									<option value="Cleansers">Cleansers</option>
									<option value="skincare">skincare</option>
									<option value="cushion">cushion</option>
									<option value="makeup-eye">makeup-eye</option>
									<option value="tools">tools</option>
                                </datalist>
							</div>
							<div class="col-sm-3 form-group">
								<br>
								<button type="submit" class="btn btn-primary" style="height: 55px"><i class="icon-search" style="width: 100px"></i></button>
							</div>
						</div>
					</form>
					
					<?php
					$sql_data = "SELECT * FROM products
                    WHERE 
                    product_name LIKE '%" . $_POST['findtext'] . "%'
                    AND product_cat LIKE '%" . $_POST['findcat'] . "%' ";
					$res_data = $db->query($sql_data);
					?>
					<div class="row">
						<?php
						$numOfCols = 3;
						$rowCount = 0;
						$bootstrapColWidth = 12 / $numOfCols;
						while ($data_arr = $res_data->fetch(PDO::FETCH_ASSOC)) {
							if ($data_arr['cur_stk'] == 0) {
						?>
								<div class="col-md-<?php echo $bootstrapColWidth; ?> text-center animate-box">
									<div class="product">
										<div class="product-grid" style="background-image:url(<?= $data_arr['product_pic'] ?>);">
											<div class="inner">
												<p>
													<a class="disabled" href="cart_add.php?product_id=<?= $data_arr['product_id'] ?>" class="icon"><i class="icon-shopping-cart"></i></a>
													<a class="disabled" href="single_items.php?product_id=<?= $data_arr['product_id'] ?>" class="icon"><i class="icon-eye"></i></a>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="single_items.php?product_id=<?= $data_arr['product_id'] ?>"><?= $data_arr['product_name'] ?></a></h3>
											<span class="price"><?= $data_arr['product_price'] ?> ฿ <p style="color:red;">sold out</p></span>
										</div>
									</div>
								</div>
							<?php
							} else {
							?>
								<div class="col-md-<?php echo $bootstrapColWidth; ?> text-center animate-box">
									<div class="product">
										<div class="product-grid" style="background-image:url(<?= $data_arr['product_pic'] ?>);">
											<div class="inner">
												<p>
													<a href="cart_add.php?product_id=<?= $data_arr['product_id'] ?>" class="icon"><i class="icon-shopping-cart"></i></a>
													<a href="single_items.php?product_id=<?= $data_arr['product_id'] ?>" class="icon"><i class="icon-eye"></i></a>
												</p>
											</div>
										</div>
										<div class="desc">
											<h3><a href="single_items.php?product_id=<?= $data_arr['product_id'] ?>"><?= $data_arr['product_name'] ?></a></h3>
											<span class="price"><?= $data_arr['product_price'] ?> ฿</span>
										</div>
									</div>
								</div>
						<?php
							}
							$rowCount++;
							if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		print_r($data_arr);
		?>

		<?php include "Page/footer.php"; ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="./js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="./js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="./js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="./js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="./js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="./js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="./js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="./js/main.js"></script>

</body>

</html>