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
                            <h2>Report STOCK Products.</h2>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['sdate'])) {
                        $sdate = $_GET['sdate'];
                    }
                    ?>
                    <form action="rep_stk_item.php" method="get">
                        <div class="row form-group">
                            <div class="col-sm-3 form-group">
                                <label>ID</label>
                                <input type="text" name="product_id" class="col-sm-4 form-control" value="<?= $_GET['product_id'] ?>" list="itemlist" required>
                                <datalist id="itemlist">
                                    <?php
                                    $sql_list = "SELECT * FROM products ORDER BY product_name";
                                    $res_list = $db->query($sql_list);
                                    while ($list_array = $res_list->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?= $list_array['product_id'] ?>"><?= $list_array['product_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <?php
                            if (isset($_GET['sdate']))
                                $sdate = $_GET['sdate'];
                            else {
                                $sdate = date('Y-m-01');
                            }
                            ?>
                            <div class="col-sm-3 form-group">
                                <label class="">Start Date</label>
                                <input type="date" name="sdate" class="col-sm-4 form-control" class="datepicker" value="<?= $sdate; ?>">
                            </div>
                            <?php
                            if (isset($_GET['edate']))
                                $edate = $_GET['edate'];
                            else {
                                $edate = date('Y-m-t');
                            }
                            ?>
                            <div class="col-sm-3 form-group">
                                <label class="">End Date</label>
                                <input type="date" name="edate" class="col-sm-4 form-control" class="datepicker" value="<?= $edate; ?>">
                            </div>
                            <div class="col-sm-3 form-group">
                                <br>
                                <button type="submit" class="btn btn-primary" style="height: 55px">Submit</i></button>
                            </div>
                        </div>
                    </form>
                    <div class="container mb-4">
                        <?php
                        if($_GET['sdate'] > $_GET['edate']){
                            ?>
                                <script>
                                    alert("Date wrong!!!");
                                    window.location = "rep_stk_item.php?sdate=<?=date('Y-m-01')?>&edate=<?=date('Y-m-t')?>";
                                </script>
                            <?php
                        }
                        $sql_item = "SELECT * FROM products WHERE product_id = '" . $_GET['product_id'] . "' ";
                        $res_item = $db->query($sql_item);
                        $item_array = $res_item->fetch(PDO::FETCH_ASSOC);

                        $sql_rem_in = "SELECT SUM(buy_item.qty) AS sQty 
                                                            FROM buy JOIN buy_item ON buy.buy_id = buy_item.buy_id
                                                            WHERE  buy_item.product_id = '" . $_GET['product_id'] . "'
                                                            AND buy.buy_recv = 'Y'
                                                            AND buy.buy_date < '" . $_GET['sdate'] . "' ";
 
                        $res_rem_in = $db->query($sql_rem_in);
                        $rem_in_arr = $res_rem_in->fetch(PDO::FETCH_ASSOC);

                        $sql_rem_out = "SELECT SUM(cart_item.qty) AS sQty 
                                                            FROM cart JOIN cart_item ON cart.cart_id = cart_item.cart_id
                                                            WHERE  cart_item.product_id = '" . $_GET['product_id'] . "'
                                                            AND cart.cart_cf = 'Y'
                                                            AND cart.cart_date < '" . $_GET['sdate'] . "' ";
                        $res_rem_out = $db->query($sql_rem_out);
                        $rem_out_arr = $res_rem_out->fetch(PDO::FETCH_ASSOC);
                        $remain = $rem_in_arr['sQty'] - $rem_out_arr['sQty'];

                        ?>
                        <div class="row">
                            <div class="col-12">
                            <center><h3>Name : <?=$item_array['product_name']?></h3></center>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th class="text-right">In</th>
                                                <th class="text-right">Out</th>
                                                <th class="text-right">คงเหลือ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $date = $_GET['sdate'];
                                            $j = 0;
                                            while (strtotime($date) <= strtotime($_GET['edate'])) {
                                                $j++;
                                                $sql_in = "SELECT SUM(buy_item.qty) AS sQty 
                                                FROM buy JOIN buy_item ON buy.buy_id = buy_item.buy_id
                                                WHERE  buy_item.product_id = '" . $_GET['product_id'] . "'
                                                AND buy.buy_recv = 'Y'
                                                AND buy.buy_date = '".$date."' ";
                                                $res_in = $db->query($sql_in);
                                                $data_in = $res_in->fetch(PDO::FETCH_ASSOC);

                                                $sql_out = "SELECT SUM(cart_item.qty) AS sQty 
                                                            FROM cart JOIN cart_item ON cart.cart_id = cart_item.cart_id
                                                            WHERE  cart_item.product_id = '".$_GET['product_id']."'
                                                            AND cart.cart_cf = 'Y'
                                                            AND cart.cart_date = '" . $date . "' ";
                                                $res_out = $db->query($sql_out);
                                                $data_out = $res_out->fetch(PDO::FETCH_ASSOC);
                                                $q_in = $data_in['sQty'];
                                                $q_out = $data_out['sQty'];
                                                if($data_in['sQty']==Null){
                                                    $q_in = 0 ;

                                                }
                                                if($data_out['sQty']==Null){
                                                    $q_out = 0 ;
                                                }
                                                $remain = $remain + $q_in - $q_out;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $j ?>
                                                    </td>
                                                    <td>
                                                        <?= $date ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= $q_in ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= $q_out ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= $remain ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
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

    <?php print_r($data_in);?>
    <?php print_r($data_out);?>
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