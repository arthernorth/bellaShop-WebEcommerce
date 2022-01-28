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
                            <h2>Report BUY DAILY.</h2>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['finddate'])) $finddate = $_GET['finddate'];
                    else $finddate = date('Y-m-d');
                    ?>
                    <form action="report_buy_daily.php" method="get">
                        <div class="row form-group">
                            <div class="col-sm-3 form-group">
                                <label class="">Date</label>
                                <input type="date" name="finddate" class="col-sm-4 form-control" class="datepicker" value="<?=$finddate;?>" onchange="this.form.submit()">
                            </div>
                        </div>
                    </form>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>สินค้า</th>
                                                <th class="text-right">จำนวน</th>
                                                <th class="text-right">ยอดเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $sql_data = "   SELECT products.product_id,products.product_name, SUM(buy_item.qty) AS sQty,SUM(buy_item.price) AS sPrice
                                                            FROM buy LEFT JOIN buy_item ON buy.buy_id = buy_item.buy_id 
                                                                     LEFT JOIN products ON buy_item.product_id = products.product_id
                                                            WHERE buy.buy_id !='' 
                                                            AND buy.buy_date = '" . $_GET['finddate'] . "' 
                                                            GROUP BY products.product_id,products.product_name
                                                            ORDER BY products.product_id ";
                                                            

                                            $res_data = $db->query($sql_data);
                                            $j = 0;
                                            while ($data_array = $res_data->fetch(PDO::FETCH_ASSOC)) {
                                                $j++;
                                                
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $j ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['product_name'] ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= $data_array['sQty'] ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?=number_format($data_array['sPrice'],2)?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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