<?php
session_start();
include 'connector.php';
?>

<?php

$time = date('H:i:s');
$date = date('Y-m-d');

$sql_del = "DELETE FROM cart_item 
    WHERE 	product_id = '" . $_GET['product_id'] . "'
    AND     cart_id = '" . $_SESSION['cart_id'] . "' ";
$res_del = $db->query($sql_del);
if ($res_del) {
    $sql_sum = "    SELECT  SUM(qty) AS sqty,
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
                                key_date = '" . $date . "',
                                key_time = '" . $time . "'
                            WHERE	cart_id = '" .  $_SESSION['cart_id'] . "' 
                        ";
    $res_update2 = $db->query($sql_update2);
?>
    <script>
        window.location = 'cart_show.php';
    </script>
<?php
} else {
?>
    <script>
        alert("delete <?= $_GET['item_id'] ?> failed");
        window.history.back();
    </script>
<?php
}
?>