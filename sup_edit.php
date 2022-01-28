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
</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <?php include "Page/nav_header.php"; ?>

        <?php
        $sql_data = "SELECT * FROM sup WHERE sup_id ='" . $_GET['sup_id'] . "' ";
        $res_data = $db->query($sql_data);
        $data_arr = $res_data->fetch(PDO::FETCH_ASSOC);
        ?>


        <div id="fh5co-contact">
            <div class="container">
                <div class="row center">
                    <div class="col-md-5 col-md-push-1 animate-box">
                        <div class="fh5co-contact-info">
                            <div class="col-md-6 mt-1"><img class="card-img-top" src="<?= $data_arr['sup_pic'] ?>" />
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 animate-box">
                        <h3>Edit Supplier <h5>Supplier ID: USI0<?= $data_arr['sup_id'];?></h5>
                        </h3>
                        <form action="sup_update.php" method="post">
                            <input type="hidden" id="id" name="id" value="<?= $data_arr['sup_id'] ?> ">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="fname">Supplier Name</label>
                                    <input type="text" id="sup_name" name="sup_name" class="form-control" value="<?= $data_arr['sup_name'] ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="subject">Contact</label>
                                    <input type="text" id="level" name="sup_contact" class="form-control" placeholder="" value="<?= $data_arr['sup_contact'] ?>" required> 

                                </div>

                                <div class="col-md-6">
                                    <label for="lname">Address</label>
                                    <input type="text" id="sup_add" name="sup_add" class="form-control" value="<?= $data_arr['sup_add'] ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="lname">Tel.</label>
                                    <input type="text" id="sup_tel" name="sup_tel" class="form-control" value="<?= $data_arr['sup_tel'] ?>" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
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