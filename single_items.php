<?php
include 'connector.php';
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Single Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />
	<!-- Animate.css -->
	<link rel="stylesheet" href="./css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="./css/icomoon.css">
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="./css/bootstrap.css">
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

	<?php include "Page/nav_header.php"; ?>

	<!-- Product section-->
	<section class="py-5">
		<div class="container px-4 px-lg-5 my-5">

			<?php
			$sql_data = "SELECT * FROM products WHERE product_id ='" . $_GET['product_id'] . "' ";
			$res_data = $db->query($sql_data);
			$data_arr = $res_data->fetch(PDO::FETCH_ASSOC);
			?>

			<div class="row gx-2 gx-lg-3 align-items-center">
				<div class="col-md-6 mt-3"><img class="card-img-top" src="<?= $data_arr['product_pic'] ?>" alt="..." /></div>
				<div class="col-md-6">
					<div class="small mb-1">PDI: <?= $data_arr['product_id'] ?></div>
					<h1 class="display-5	 fw-bolder"><?= $data_arr['product_name'] ?></h1>
					<h4><span class="text-decoration-line-through">Price: <?= $data_arr['product_price'] ?> ฿</span></h4>
					<?php
					if ($data_arr['cur_stk'] == 0) {
						echo "<h4>Available: <span class=" . 'text-decoration-line-through' . " style=" . 'color:red;' . ">Sold out</span></h4>";
					} else {
						echo "<h4><span class=" . 'text-decoration-line-through' . " >Available:". $data_arr['cur_stk'] ." </span></h4>";
					}
					?>
					<div class="fs-5 mb-5">
						<span class="text-decoration-line-through"><?= $data_arr['product_detail'] ?></span>
					</div>
					<p class="lead"></p>
				</div>
				<div class="small mb-1">
					<?php
					if ($data_arr['cur_stk'] == 0) {
					?>
						<a class="disabled" href="cart_add.php?product_id=<?= $data_arr['product_id'] ?>">
							<button class="btn btn-primary btn-outline " type="button" style="margin-left: 14px">
								<del><i class="icon-shopping-cart"></i>
								Add to cart</del>
							</button>
						</a>
					<?php
					} else {
					?>
						<a href="cart_add.php?product_id=<?= $data_arr['product_id'] ?>">
							<button class="btn btn-primary btn-outline " type="button" style="margin-left: 14px">
								<i class="icon-shopping-cart"></i>
								Add to cart
							</button>
						</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- Product section-->

	<?php include "Page/footer.php"; ?>

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