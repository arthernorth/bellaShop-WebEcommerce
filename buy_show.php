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
        // function ของ Javascript เพื่อให้ยืนยันการลบสินค้าในเอกสาร (detail)
        function cf_del_dtl(i_id, b_id) {
            //alert();
            cf = confirm("ยืนยันลบสินค้า" + i_id);
            if (cf) {
                window.location = "buy_del_item.php?product_id=" + i_id + "&buy_id=" + b_id;
            }
        }
        // function ของ Javascript เพื่อให้ยืนยันการลบเอกสาร (Master)
        function cf_del_master(b_id) {
            //alert();
            cf = confirm("ยืนยันลบเอกสาร" + b_id);
            if (cf) {
                window.location = "buy_delete.php?buy_id=" + b_id;
            }
        }

        function cf_stk(b_id) {
            //alert();
            cf = confirm("ยืนยันสินค้าเข้าร้าน");
            if (cf) {
                window.location = "buy_stk.php?buy_id=" + b_id;
            }
        }
        // function ของ Javascript เพื่อให้ยกเลิกการยืนยันการรับสินค้าเข้าร้าน เพื่อไปปรับ Stock
        function cf_stk_void(b_id) {
            //alert();
            cf = confirm("ยกเลิกยืนยันสินค้าเข้าร้าน");
            if (cf) {
                window.location = "buy_stk_void.php?buy_id=" + b_id;
            }
        }
    </script>
</head>

<body>
    <div class="fh5co-loader"></div>

    <div id="page">

        <?php include "Page/nav_header.php"; ?>
        <div id="fh5co-product">
        <div class="card text-center">

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <h2>Add Supply.</h2>
                            </div>
                        </div>
                        <?php
                        $sql_master = " SELECT *  FROM buy 
                                WHERE buy_id = '" . $_GET['buy_id'] . "'";
                        $res_master = $db->query($sql_master);
                        $master_array = $res_master->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form action="buy_add.php" method="post">
                            <div class="row form-group">
                                <div class="col-sm-3 form-group">
                                    <h3>In-Store <?= $master_array['buy_id'] ?></h3>
                                    <input type="hidden" name="buy_id" value="<?= $master_array['buy_id'] ?>">
                                </div>
                                <div class=" col-sm-3 form-group">

                                </div>
                                <div class=" col-sm-3 form-group">

                                </div>
                                <div class=" col-sm-3 form-group">
                                    <?php if ($master_array['buy_recv'] != 'Y') { ?>
                                        <button type="button" class="btn btn-info btn-outline" onclick="cf_stk('<?= $master_array['buy_id'] ?>');">ยืนยันสินค้าเข้าร้าน</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-danger btn-outline" onclick="cf_stk_void('<?= $master_array['buy_id'] ?>');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z" />
                                            </svg></button>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-5 form-group">
                                    <select class="col-md-7 form-group" name="sup_id" id="sup_id" required>
                                        <option value="" disabled selected>--- Select a Supplier --- </option>
                                        <?php
                                        $sql_list = "SELECT * FROM sup ORDER BY sup_name";
                                        $res_list = $db->query($sql_list);
                                        while ($list_array = $res_list->fetch(PDO::FETCH_ASSOC)) {
                                            if ($list_array['sup_id'] == $master_array['sup_id'])
                                                $sel = ' selected ';
                                            else
                                                $sel = '';
                                        ?>
                                            <option <?= $sel ?> value="<?= $list_array['sup_id'] ?>"><?= $list_array['sup_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-3 form-group">
                                    <label>Date</label>
                                    <input type="date" name="buy_date" class="form-control" class="datepicker" value="<?= $master_array['buy_date'] ?>">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Qty</label>
                                    <input type="text" name="buy_qty" class="form-control" value="<?= $master_array['buy_qty'] ?>" readonly>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Amount</label>
                                    <input type="text" name="buy_money" class="form-control" value="<?= $master_array['buy_money'] ?>" readonly>
                                </div>
                                <div class="col-sm-3 mt-3">
                                    <?php if ($master_array['buy_recv'] != 'Y') { ?>
                                        <br>
                                        <input type="submit" value="ยืนยัน" class="btn btn-success btn-outline">
                                    <?php } ?>
                                    <?php if (isset($master_array['buy_id']) && $master_array['buy_recv'] != 'Y') { ?>
                                        <button type="button" class="btn btn-danger btn-outline" onclick="cf_del_master('<?= $master_array['buy_id'] ?>') ">X</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
        <div id="fh5co-product">
            <div class="container">
                <?php
                if (isset($master_array['buy_recv']) && $master_array['buy_recv'] != 'Y') {
                ?>
                    <div class="row">
                        <?php
                        $sql_master = " SELECT *  FROM buy 
                                WHERE buy_id = '" . $_GET['buy_id'] . "'";
                        $res_master = $db->query($sql_master);
                        $master_array = $res_master->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <form action="buy_add_item.php" method="post">
                            <div class="row form-group">
                                <input type="hidden" name="buy_id" id="buy_id" value="<?= $master_array['buy_id'] ?>">
                                <div class="col-sm-3 form-group">
                                    <label>Products</label>
                                    <input type="text" name="product_id" id="product_id" list="item_list" class="form-control">
                                    <datalist id="item_list">
                                        <?php
                                        $sql_list = "SELECT * FROM products ORDER BY product_name";
                                        $res_list = $db->query($sql_list);
                                        while ($list_array = $res_list->fetch(PDO::FETCH_ASSOC)) {
                                            if ($list_array['product_id'] == $master_array['product_id'])
                                        ?>
                                            <option value="<?= $list_array['product_id'] ?>"><?= $list_array['product_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" id="price" min="0" step="any" max="10000" class="form-control" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Qty</label>
                                    <input type="text" name="qty" id="qty" min="0" step="any" max="10000" class="form-control" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-outline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" fill="#000" />
                                        </svg></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="container">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $sqty = 0;
                                $smoney = 0;
                                $sql_dtl = "    SELECT buy_item.*, products.product_name
                                                FROM buy_item  LEFT JOIN products ON buy_item.product_id=products.product_id 
                                                WHERE  buy_id = '" . $master_array['buy_id'] . "' ";
                                $res_dtl = $db->query($sql_dtl);
                                while ($dtl_array = $res_dtl->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?= $dtl_array['product_id'] ?></td>
                                        <td><?= $dtl_array['product_name'] ?></td>
                                        <td><?= number_format($dtl_array['price']) ?></td>
                                        <td>
                                            <center>
                                                <?= $dtl_array['qty'] ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php if ($master_array['buy_recv'] != 'Y') { ?>
                                                    <a href="#" onclick="cf_del_dtl('<?= $dtl_array['product_id'] ?>','<?= $dtl_array['buy_id'] ?>')" class="red-text"><i class="material-icons">clear</i></a>
                                                <?php } ?>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                    $sqty = $sqty + $dtl_array['qty'];
                                    $smoney = $smoney + ($dtl_array['price'] * $dtl_array['qty']);
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Qty</td>
                                    <td>
                                        <center><?= $sqty ?></center>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td>
                                        <center><strong><?= number_format($smoney) ?> ฿</center></strong>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
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