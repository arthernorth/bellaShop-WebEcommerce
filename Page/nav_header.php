<?php
session_start();
error_reporting(0);
include "connector.php";
?>

<nav class="fh5co-nav" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-2">
				<div id="fh5co-logo"><a href="index.php?user_name=<?= $data_arr['user_name'] ?>">Bella.</a></div>
			</div>
			<div class="col-md-6 col-xs-6 text-center menu-1">
				<ul>
					<?php
					if ($_SESSION['user_level'] == 'admin') {
					?>
						<li class="has-dropdown">
							<a href="product.php">Shop</a>
						</li>
						<li class="has-dropdown">
							<a>working Management</a>
							<ul class="dropdown">
								<li><a href="billing_list.php?sdate=<?= date('Y-m-01'); ?>&edate=<?= date('Y-m-29'); ?>">Billing List</a></li>
								<li><a href="buy_list.php?finddate=<?= $_SESSION['login_date'] ?>">Supply List</a></li>
								<li><a href="buy_show.php">Supply Add</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a>Basic Management</a>
							<ul class="dropdown">
								<li><a href="admin_edit.php">User Management</a></li>
								<li><a href="product_list.php">Products Management</a></li>
								<li><a href="sup_list.php">Supplier Management</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a>Report</a>
							<ul class="dropdown">
								<li><a href="report_user_daily.php?finddate=<?= date('Y-m-d'); ?>">Report User Daily</a></li>
								<li><a href="report_user_month.php?sdate=<?= date('Y-m-01'); ?>&edate=<?= date('Y-m-29'); ?>">Report User Monthly</a></li>
								<li><a href="report_sold_daily.php?finddate=<?= date('Y-m-d'); ?>">Report Products Sold daily</a></li>
								<li><a href="report_sold_month.php?sdate=<?= date('Y-m-01'); ?>&edate=<?= date('Y-m-29'); ?>">Report Products Sold Monthly</a></li>
								<li><a href="report_buy_daily.php?finddate=<?= date('Y-m-d'); ?>">Report Buy Daily</a></li>
								<li><a href="report_buy_month.php?sdate=<?= date('Y-m-01'); ?>&edate=<?= date('Y-m-29'); ?>">Report Buy Monthly</a></li>
								<li><a href="rep_stk_item.php">Report Stock Products</a></li>
							</ul>
						</li>
					<?php
					} else {
					?>
						<li class="has-dropdown">
							<a href="product.php">Shop</a>
						</li>
						<?php
						if (isset($_SESSION['user_name'])) {
						?>
							<li class="has-dropdown">
								<a href="user_payment.php">Payment</a>
							</li>
							<li class="has-dropdown">
								<a href="user_tracking.php">tracking</a>
							</li>
						<?php
						}
						?>
					<?php
					}
					?>
				</ul>
			</div>
			<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
				<ul>
					<?php
					if (isset($_SESSION['user_name'])) {
					?>
						<li><a href="user_profile.php"><?= $_SESSION['user_name'] ?></a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="cart_show.php" class="cart"><span><small>
										<?php
										if (!isset($_SESSION['cart_qty'])) {
										?>
											0
										<?php
										} else {
										?>
											<?= $_SESSION['cart_qty'] ?>
										<?php
										}
										?>
									</small><i class="icon-shopping-cart"></i></span></a></li>
				</ul>
			<?php
					} else {
			?>
				<li><a href="login.php">Login</a></li>
			<?php
					}
			?>
			</div>
		</div>
	</div>
</nav>