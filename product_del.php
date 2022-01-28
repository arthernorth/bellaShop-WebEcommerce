<?php
	session_start();
	include 'connector.php';
?>

<?php
    $sql_del = "DELETE FROM products 
                WHERE 	product_id = '".$_GET['product_id']."' ";   
    $res_del = $db->query($sql_del);
    if($res_del)
    {   
        echo "<script>window.location='product_list.php'</script>";
    }
?>

