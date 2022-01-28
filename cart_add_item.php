<?php
session_start();
include "connector.php";
?>

<?php
$the_date = date('y-m-d');
$the_time = date("h:i:s");

if (!isset($_SESSION['cart_id'])) {
    echo "<script>window.location='cart_add.php?product_id=" . $_GET['product_id'] . "';</script>";
} else {
    $sql_show = "   SELECT *  FROM cart_item 
        WHERE product_id = '" . $_GET['product_id'] . "' 
        AND   cart_id = '" . $_SESSION['cart_id'] . "'";
    $res_show = $db->query($sql_show);
    $show_array = $res_show->fetch(PDO::FETCH_ASSOC);
    if (!isset($show_array['product_id'])) {
        $sql_data = "   SELECT *  FROM products 
                        WHERE product_id = '" . $_GET['product_id'] . "' ";
        $res_data = $db->query($sql_data);
        $data_array = $res_data->fetch(PDO::FETCH_ASSOC);
        $sql_update =    "INSERT INTO   cart_item (
                                        cart_id,
                                        product_id,
                                        price,
                                        qty
                                        )
                                        VALUES 
                                        (
                                        '" . $_SESSION['cart_id'] . "',
                                        '" . $_GET['product_id'] . "',
                                        '" . $data_array['product_price'] . "',
                                        '1'
                                        ) ";
    } else {
        $add_qty = 1;
        if (isset($_GET['add_qty'])) $add_qty = $_GET['add_qty'];
        $sql_update = "	UPDATE cart_item 
                            SET	qty = qty+'" . $add_qty . "'
                            WHERE	cart_id = '" .  $_SESSION['cart_id'] . "'
                            AND     product_id = '" . $_GET['product_id'] . "' 
                            ";
    }
    $res_update = $db->query($sql_update);
    if ($res_update) {
        $sql_sum = "SELECT  SUM(qty) AS sqty,
                            SUM(qty*price) AS smoney
                    FROM    cart_item 
                    WHERE   cart_id = '" . $_SESSION['cart_id'] . "'";
        $res_sum = $db->query($sql_sum);
        $sum_array = $res_sum->fetch(PDO::FETCH_ASSOC);
        $_SESSION['cart_qty'] = $sum_array['sqty'];
        $_SESSION['cart_money'] = $sum_array['smoney'];
        $sql_update2 = "	UPDATE cart
                                SET	cart_qty = '" .  $sum_array['sqty'] . "',
                                    cart_money = '" .  $sum_array['smoney'] . "',
                                    key_date = '" . $the_date . "',
                                    key_time = '" . $the_time . "'
                                WHERE	cart_id = '" .  $_SESSION['cart_id'] . "' 
                            ";
        $res_update2 = $db->query($sql_update2);
        echo "<script>window.location='cart_show.php';</script>";
    }
}
?>