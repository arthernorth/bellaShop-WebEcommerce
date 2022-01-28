<?php
    session_start();
    include "connector.php";
?>

<?php
    $ok=0;
    $err=0;
    $sql_data = "SELECT * FROM cart_item WHERE cart_id = '".$_SESSION['cart_id']."' ";
    $res_data = $db->query($sql_data);
    while($data_array=$res_data->fetch(PDO::FETCH_ASSOC) )
    {
        $sql_update = " UPDATE products SET cur_stk = cur_stk - '".$data_array['qty']."' 
                        WHERE 	product_id = '".$data_array['product_id']."' ";   
        $res_update = $db->query($sql_update);
        if($res_update)
            $ok++;
        else
            $err++;
    }
    if($err==0)
    {
        $the_date = date('Y-m-d');
        $the_time = date("H:i:s");

        $sql_update = "	UPDATE cart
                        SET	cart_cf = 'Y',
                            key_date = '" . $the_date . "',
                            key_time = '" . $the_time . "'
                        WHERE	cart_id = '" .  $_SESSION['cart_id'] . "' 
                        "; 
        $res_update = $db->query($sql_update);
        if($res_update)
        {
            unset ($_SESSION['cart_id']);
            unset ($_SESSION['cart_qty']);
            unset ($_SESSION['cart_money']); 

            echo "<script>window.location='index.php';</script>";
        }
    }
    else
    {
        ?>
                <script>
                    alert("ยืนยันสั่งสินค้า<?=$_SESSION['cart_id']?>ผิดพลาด");
                    window.history.back();
                </script>
        <?php        
    }      
            

    


?>

