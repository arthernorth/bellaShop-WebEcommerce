<?php
	session_start();
	include 'connector.php';
?>

<?php
    $sql_del = "DELETE FROM cart 
                WHERE 	cart_id = '".$_SESSION['cart_id']."' ";   
    $res_del = $db->query($sql_del);
    if($res_del)
    {
        $sql_del_dtl = "DELETE FROM cart_item
                        WHERE 	cart_id = '".$_SESSION['cart_id']."' ";   
        $res_del_dtl = $db->query($sql_del_dtl);
  
        unset ($_SESSION['cart_id']);
        unset ($_SESSION['cart_qty']);
        unset ($_SESSION['cart_money']);
        
        
        echo "<script>window.location='index.php'</script>";
    }
?>

