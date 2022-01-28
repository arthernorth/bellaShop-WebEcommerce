<?php include "connector.php"; ?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Homepage</title>
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

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
	<link rel="stylesheet" href="./css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="./css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script>
		// function ของ Javascript เพื่อให้ยืนยันการลบสินค้าในตะกร้า (detail)
		function delete_product(the_id) {
			cf = confirm("Do you want to delete this product?");
			if (cf) {
				window.location = "cart_delete_product.php?product_id=" + the_id;
			}
		}

		function delete_cart(the_id) {
			cf = confirm("Do you want to delete this cart?");
			if (cf) {
				window.location = "cart_delete.php";
			}
		}

		function order_confirm(the_id) {
			cf = confirm("Do you want to confirm this order?");
			if (cf) {
				window.location = "cart_cf.php";
			}
		}

		function noqty(){
			cf = confirm("Can't increase quantity because out of stock. Please try again !!!");
			if (cf) {
				window.location = "cart_show.php";
			}
		}
	</script>
</head>


<div id="page">
	<?php include "Page/nav_header.php"; ?>

	<?php
	$sql_master = "	SELECT * FROM cart 
                	WHERE cart_id = '" . $_SESSION['cart_id'] . "'";
	$res_master = $db->query($sql_master);
	$master_array = $res_master->fetch(PDO::FETCH_ASSOC);
	$sql_dtl = "SELECT cart_item.*, products.product_name , products.cur_stk
				FROM cart_item  LEFT JOIN products ON cart_item.product_id = products.product_id
				WHERE cart_item.cart_id = '" . $master_array['cart_id'] . "' ";
	$res_dtl = $db->query($sql_dtl);
	$_SESSION['cart_qty'] =  $master_array['cart_qty'];
	?>

	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Make your beautiful with power of positive mindset.</span>
						<h2>cart.</h2>
					</div>
				</div>
				<div class="container mb-4">
					<div class="row">
						<div class="col-12">
							<div class="table-responsive">
								<table class="table table-striped">
									<?php
									if ($master_array['cart_qty'] == 0) {
									?>
										<div class="row animate-box">
											<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
												<h2>No product in cart.</h2>
												<a href="product.php"><button class="btn btn-primary btn-outline">Shopping</button></a>
											</div>
										</div>
								</table>
							</div>
						<?php
									} else {
						?>
							<thead>
								<tr>
									<th scope="col"> </th>
									<th scope="col">Product</th>
									<th scope="col">Available</th>
									<th scope="col" class="text-center">Quantity</th>
									<th scope="col" class="text-right">Price</th>
									<th scope="col" class="text-right"><a onclick="delete_cart('<?= $dtl_array['cart_id'] ?>')"><button class="btn btn-sm btn-danger btn-outline" style="height:40px">
												<center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
														<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
													</svg></center>
											</button></a>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
										$sqty = 0;
										$smoney = 0;
										while ($dtl_array = $res_dtl->fetch(PDO::FETCH_ASSOC)) {
											$sql_data = "SELECT * FROM products 
												WHERE product_id = '" . $dtl_array['product_id'] . "'
												";
											$res_data = $db->query($sql_data);
											$data_arr = $res_data->fetch(PDO::FETCH_ASSOC);
								?>
									<tr>
										<td><img src="<?php echo $data_arr['product_pic']; ?>" style="width:100px" /> </td>
										<td><?= $dtl_array['product_name'] ?></td>
										<td>In stock</td>
										<td>
											<center>
												<?php
												if ($dtl_array['qty'] >= $dtl_array['cur_stk']) {
												?>
													<div class="right-align">
														<a onclick="noqty()" class="grey-text">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
																<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
															</svg>
														</a>
													</div>
												<?php
												} else {
												?>
													<div class="right-align">
														<a href="cart_add_item.php?product_id=<?= $dtl_array['product_id'] ?>&add_qty=1" class="grey-text">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
																<path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
															</svg>
														</a>
													</div>
												<?php
												}
												?>
												<div class="center-align"><?= $dtl_array['qty']  ?></div>
												<div class="left-align">
													<?php
													if ($dtl_array['qty'] == 1) {
													?>
														<a onclick="delete_product('<?= $dtl_array['product_id'] ?>')">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
																<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
															</svg>
														</a>
													<?php
													} else {
													?>
														<a href="cart_add_item.php?product_id=<?= $dtl_array['product_id'] ?>&add_qty=-1" class="grey-text">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
																<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
															</svg>
														</a>
													<?php
													}
													?>
												</div>
											</center>

										</td>
										<td class="text-right"><?= number_format($dtl_array['price']) ?> ฿</td>
										<td class="text-right"><a onclick="delete_product('<?= $dtl_array['product_id'] ?>')"><button class="btn btn-sm btn-danger btn-outline" style="width:50px">x</button></a></td>
									</tr>
								<?php
											$sqty = $sqty + $dtl_array['qty'];
											$smoney = $smoney + ($dtl_array['price'] * $dtl_array['qty']) + 45;
										}
								?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>Order ID:</td>
									<td class="text-right"><?= $master_array['cart_id'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>Date:</td>
									<td class="text-right">&nbsp;<?= $master_array['cart_date'] ?>&nbsp;<?= $master_array['cart_time'] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>Shipping</td>
									<td class="text-right">45 ฿</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>Qty</td>
									<td class="text-right"><?= $sqty ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td class="text-right"><strong><?= number_format($smoney) ?> ฿</strong></td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
					<div class="col mb-2">
						<div class="row">
							<div class="col-sm-12  col-md-6">

							</div>
							<div class="col-sm-12 col-md-6 text-right">
								<a href="product.php"><button class="btn btn-primary btn-outline">Continue Shopping</button></a>
								</a><button class="btn btn-success btn-outline" onclick="order_confirm('<?= $dtl_array['cart_id'] ?>')">Checkout</button>
							</div>
						</div>
					</div>
				<?php
									}
				?>

				</div>
			</div>
		</div>
	</div>
</div>

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