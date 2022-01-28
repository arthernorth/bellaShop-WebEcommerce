<?php
session_start();
include "connector.php";

$sql_update = " UPDATE products 
                        SET product_id = '" . $_POST['product_id'] . "' ,
                            product_name = '" . $_POST['product_name'] . "' ,
                            product_cat= '" . $_POST['product_cat'] . "' ,
                            product_price = '" . $_POST['product_price'] . "' ,
                            cur_stk = '" . $_POST['cur_stk'] . "' 
                        WHERE
                         product_id = '" . $_POST['product_id'] . "' ";
if ($res_update = $db->query($sql_update)) {
?>
    <script>
        alert("update Sucessfully!!");
        window.location = "product_list.php?>";
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
?>