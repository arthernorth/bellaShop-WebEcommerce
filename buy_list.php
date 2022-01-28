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
        function see_all(){
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
                            <h2>Supplier list.</h2>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['finddate'])) $finddate = $_GET['finddate'];
                    else $finddate = date('Y-m-d');
                    ?>
                    <form action="buy_list.php" method="GET">
                        <div class="row form-group">
                            <div class="col-sm-3 form-group">
                                <input type="date" name="finddate" id="finddate" class="form-control" class="datepicker" value="<?php if($_GET['all_data'] == 'see_all') echo "-----"; else echo $finddate; ?>">
                            </div>
                            <div class="col-sm-3 form-group">
                                <input type="text" name="findtext" class="form-control" value="<?php echo $_GET['buy_date'] ?>">
                            </div>
                            <div class="col-sm-3 form-group">
                                <button type="submit" class="btn btn-primary " style="height: 55px"><i class="icon-search" style="width: 100px"></i></button>
                                <button type="button" class="btn btn-primary " style="height: 55px" onclick="see_all()">see all</button>
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
                                                <th scope="col">เลขที่เอกสาร</th>
                                                <th scope="col">เลขที่ผู้ขาย</th>
                                                <th scope="col">ผู้ขาย</th>   
                                                <th scope="col">วันที่</th>
                                                <th scope="col">จำนวน</th>
                                                <th scope="col">ยอดเงิน</th>
                                                <th scope="col">จ่ายเงิน</th>
                                                <th scope="col">รับของ</th>
                                                <th scope="col">ผู้บันทึก</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if ($_GET['all_data'] == 'see_all') {
                                                $sql_data = "SELECT * FROM buy ";
                                                $res_data = $db->query($sql_data);
                                            } else {
                                                $sql_data = "   SELECT *  
                                                            FROM buy LEFT JOIN sup ON buy.sup_id = sup.sup_id 
                                                            WHERE buy_id != '' 
                                                            AND  (  buy_id LIKE  '%" . $_GET['findtext'] . "%' 
                                                                            OR  buy.sup_id LIKE  '%" . $_GET['findtext'] . "%' 
                                                                            OR  sup_name LIKE  '%" . $_GET['findtext'] . "%'
                                                                                )
                                                                            AND buy_date = '" . $_GET['finddate'] . "' 
                                                                            ORDER BY buy_id LIMIT 0,30 ";
                                                $res_data = $db->query($sql_data);
                                            }

                                            $j = 0;
                                            while ($data_array = $res_data->fetch(PDO::FETCH_ASSOC)) {
                                                $j++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $j ?>
                                                    </td>
                                                    <td>
                                                        <a href="buy_show.php?buy_id=<?= $data_array['buy_id'] ?>"><?= $data_array['buy_id'] ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['sup_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['sup_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['buy_date'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['buy_qty'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['buy_money'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['buy_paid'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['buy_recv'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_array['key_id'] ?>
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