<!-- wait database product  -->
<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
			<li style="background-image: url(images/product_skincare_36.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">390฿</span>
								<h2>e.l.f. Super brightening</h2>
								<p>ปลดล็อคผิวหมองให้ดูโกลว์ใสแบบสาวเกาหลี 3D ผิวกระจ่างใส เรียบเนียนและอิ่มน้ำ ผสาน 3 พลัง กลูต้าบูส-ซี ประสิทธิภาพเหนือกว่าวิตามินซี 15 เท่า พอนด์สช่วยลดจุดดำ รอยสิว ฝ้าแดด เผยผิวดูกระจ่างใส วิตามินบี 3 พอนด์สช่วยกระชับรูขุมขนให้ดูเล็กลง เผยผิวดูเรียบเนียน 3D ไฮยาลูรอนิค พอนด์สผสานไฮยาลูรอนิค โมเลกุลขนาดใหญ่ กลางและเล็ก ช่วยเติมน้ำให้ชั้นผิวอย่างล้ำลึก ผิวอิ่มน้ำทันที ผลทดสอบประสิทธิภาพแอนตี้ออกซิแดนท์ในห้องปฏิบัติการ สื่อถึงสาร Sodium Pyroglutamate, Glycine, Cystine เมื่อใช้เป็นประจำอย่างต่อเนื่อ</p>
								<p><a href="single_items.php?product_id=36&user_name=<?= $_GET['user_name'] ?>" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/product_foundation_4.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">590</span>
								<h2>153S ELF Acne Fighting Foundation</h2>
								<p>รองพื้นสำหรับจัดการกับทุกปัญหาสิว สามารถปกปิดที่ดีเยี่ยม ทั้งกับรอยสิวที่กำลังเป็น รอยแดงจากสิวอักเสบ รอยดำจากสิวที่หายแล้ว ปกปิดทุกปัญหาสิวให้ผิวหน้าเนียนเรียบอย่างเป็นธรรมชาติ ไม่หนาเต๊อะ อีกทั้งยังช่วยควบคุมความมัน และติดทนยาวนานถึง 12 ชั่วโมง</p>
								<p><a href="single_items.php?product_id=15&user_name=<?= $_GET['user_name'] ?>" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/product_cleanser_5.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">390฿</span>
								<h2>The Basics Mini Skincare</h2>
								<p>น้ำยาทำความสะอาดที่ให้ความชุ่มชื้นนี้มีส่วนผสมที่ช่วยบำรุงผิวอย่างกรดไฮยาลูโรนิกและเซราไมด์ ทำให้ผิวรู้สึกชุ่มชื้น สะอาด และดูมีสุขภาพดี </p>
								<p><a href="single_items.php?product_id=26&user_name=<?= $_GET['user_name'] ?>" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>
<!-- wait database product  -->

<div id="fh5co-services" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 text-center">
				<div class="feature-center animate-box" data-animate-effect="fadeIn">
					<span class="icon">
						<i class="icon-credit-card"></i>
					</span>
					<h3>Credit Card</h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 text-center">
				<div class="feature-center animate-box" data-animate-effect="fadeIn">
					<span class="icon">
						<i class="icon-wallet"></i>
					</span>
					<h3>Save Money</h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 text-center">
				<div class="feature-center animate-box" data-animate-effect="fadeIn">
					<span class="icon">
						<i class="icon-paper-plane"></i>
					</span>
					<h3>Inexpesive Delivery</h3>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$sql_data = "SELECT * FROM products ORDER BY RAND() LIMIT 4  ";
$res_data = $db->query($sql_data);
?>

<div id="fh5co-product">
	<div class="container">
		<div class="row">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Products.</h2>
				</div>
			</div>
			<?php
			while ($data_arr = $res_data->fetch(PDO::FETCH_ASSOC)) {
			?>
				<div class="col-md-3 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(<?= $data_arr['product_pic'] ?>);">
							<div class="inner">
								<p>
									<a href="cart_add.php?product_id=<?= $data_arr['product_id']?>" class="icon"><i class="icon-shopping-cart"></i></a>
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
			?>

		</div>
		<center>
			<a href="/product.php" class="btn btn-primary btn-outline">Show all products</a>
		</center>
	</div>
</div>
</div>
</div>