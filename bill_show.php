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
                            <h2>Billing.</h2>
                        </div>
                    </div>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>Tax No.</td>
                                                <td>Product</td>
                                                <td class="text-right">Status</td>
                                                <td class="text-right"></td>
                                                <td class="text-right">Quntity</td>
                                                <td class="text-right">Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_data = "SELECT * 
                                    FROM cart_item JOIN products On products.product_id =  cart_item.product_id
                                    WHERE cart_id = '" . $_GET['cart_id'] . "' 
                                    GROUP BY products.product_id,products.product_name 
                                    ORDER BY products.product_id ";

                                            $res_data = $db->query($sql_data);

                                            $sql_data_sum = "SELECT * FROM cart WHERE cart_id = '" . $_GET['cart_id'] . "' ";
                                            $res_data_sum = $db->query($sql_data_sum);
                                            $sum = $res_data_sum->fetch(PDO::FETCH_ASSOC);

                                            while ($data_arr = $res_data->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data_arr['cart_id'] ?></td>
                                                    <td><?= $data_arr['product_name'] ?></td>
                                                    <td class="text-right">confirmed</td>
                                                    <td class="text-right"></td>
                                                    <td class="text-right"><?= $data_arr['qty'] ?></td>
                                                    <td class="text-right"><?= $data_arr['price'] ?> ฿</td>
                                                </tr>

                                        </tbody>
                                    <?php
                                            }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Order ID:</td>
                                        <td class="text-right"><?= $sum['cart_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Date:</td>
                                        <td class="text-right">&nbsp;<?= $sum['cart_date'] ?>&nbsp;<?= $sum['cart_time'] ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Qty</td>
                                        <td class="text-right"><?= $sum['cart_qty'] ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td class="text-right"><strong><?= number_format($sum['cart_money']) ?> ฿</strong></td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                           
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