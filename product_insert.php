<?php
include "connector.php";
session_start();
if ($_SESSION['user_level'] == 'admin') {
    $sql_insert = "  INSERT INTO products (
            product_name,
            product_cat,
            product_price,
            product_detail,
            cur_stk,
            product_pic
        )
VALUES  
        (
            '" . $_POST['product_name'] . "',
            '" . $_POST['product_cat'] . "',
            '" . $_POST['product_price'] . "',
            '" . $_POST['product_detail'] . "',
            '" . 0 . "',
            '" . 'images/empty.jpg' . "'
        )
";


    if ($res_update = $db->query($sql_insert)) {
?>
        <script>
            alert("Add product Sucessfully!!");
            window.location = "product_list.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Have Something wrong!!");
            window.history.back();
        </script>
    <?php
    }
} 
?>