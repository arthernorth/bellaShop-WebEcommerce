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
            cf = confirm("Are you sure to delete this user?");
            if (cf) {
                window.location = "user_delete.php?user_id=" + id;
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
            <div class="container mb-4">
                <div class="row">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>Supply list.</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>detail</th>
                                        <th>categories</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="product_insert.php" method="post">
                                            <td><input type="text" name="product_name"></td>
                                            <td><input type="text" name="product_detail"></td>
                                            <td><input type="text" name="product_cat"></td>
                                            <td><input type="text" name="product_price"></td>
                                            <td><input class="btn btn-success" type="submit" value="submit" style="Height:40px"></td>
                                        </form>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
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