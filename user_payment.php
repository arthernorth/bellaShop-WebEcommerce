<?php include "connector.php" ?>
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
    <script>
        function see_all() {
            window.location = "buy_list.php?all_data=see_all";
        }
    </script>
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
                            <h2> Payment AND Tracking. </h2>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th scope="col">Tax No.</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status Payment</th> 
                                                <th scope="col">Status delivery</th>
                                                <th scope="col" class="text-right">Quantity</th>
                                                <th scope="col" class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sql_data = "   SELECT * 
                                            FROM cart 
                                            WHERE cart_id != '' 
                                            AND user_id = '" . $_SESSION['user_id'] . "'
                                            AND cart_cf  = 'Y'
                                            ";
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
                                                       <?= $data_array['cart_id'] ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $_SESSION['user_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php if($data_array['cart_paid'] == 'N'){
                                                            ?>
                                                             <a href="pay_suceess.php?cart_id=<?= $data_array['cart_id'] ?>">Pay</a>
                                                            <?php
                                                        }else{
                                                            echo "Paid" ; 
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if($data_array['cart_sent'] == 'N'){
                                                            ?>
                                                            <a href="sent_suceess.php?cart_id=<?= $data_array['cart_id'] ?>">delivery</a>
                                                            <?php
                                                        }else{
                                                            echo "delivered" ; 
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= $data_array['cart_qty'] ?>
                                                    </td >
                                                    <td class="text-right">
                                                        <?= $data_array['cart_money'] ?>
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