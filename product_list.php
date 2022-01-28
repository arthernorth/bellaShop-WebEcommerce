<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Management</title>
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
        function user_delete(id) {
            cf = confirm("Are you sure to delete this product?");
            if (cf) {
                window.location = "user_delete.php?product_id=" + id;
            }
        }
    </script>
</head>


<div id="page">
    <?php include "Page/nav_header.php"; ?>

    <?php
    if (isset($_SESSION['user_level'])) {
        if ($_SESSION['user_level'] == "user") {
    ?>
            <Script>
                window.alert("You are not admin, You couldn't permission ");
                window.location = "user_profile.php?user_name=<?= $_SESSION['user_name'] ?>"
            </Script>
        <?php
        } else {
        ?>
            <div id="fh5co-product">
                <div class="container mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="row animate-box">
                                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                    <span>Page for Admin.</span>
                                    <h2>Stock And Products list.</h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row-mb-3">
                                    <div class="col-mb-3">
                                        <a href="product_add.php"><button class="btn btn-sm btn-primary">ADD Product</button></a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>categories</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_data = "SELECT * FROM products ";
                                            $res_data = $db->query($sql_data);
                                            while ($data_arr = $res_data->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td>PDI:<?= $data_arr['product_id'] ?></td>
                                                    <td><?= $data_arr['product_name'] ?></td>
                                                    <td><?= $data_arr['product_cat'] ?></td>
                                                    <td><?= $data_arr['product_price'] ?></td>
                                                    <td><?= $data_arr['cur_stk'] ?></td>
                                                    <td><a href="product_edit.php?product_id=<?= $data_arr['product_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                                                                <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z" />
                                                            </svg></a>
                                                    </td>
                                                    <td><a href="product_del.php?product_id=<?= $data_arr['product_id']; ?>"> delete </a></td>
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
    <?php
        }
    }
    ?>
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