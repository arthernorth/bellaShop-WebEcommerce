<?php
    session_start();
    include 'connector.php';
?>

<?php
    $time = date('H:i:s');
    $date = date('Y-m-d');

    if(!isset($_SESSION['user_id'])){
        ?>
            <script>
                    window.alert("You should to login first!!");
                    window.location = "login.php";
            </script>
        <?php
    }
    else if(!isset($_SESSION['cart_id'])){
        $i=0;
        do
        {
            $i++;
            $theid=date('YmdHis').$i;
            $chk_row="SELECT * FROM cart WHERE cart_id = '".$theid."' ";
            $res_row=$db->query($chk_row);
            $cnt=$res_row->rowCount();
        }while($cnt>0);

        $_SESSION['cart_id']=$theid;
        $_SESSION['cart_qty']=0;
        $_SESSION['cart_money']=0;

        $sql_update =    "INSERT INTO cart (
                                            cart_id, 
                                            user_id, 
                                            cart_date,
                                            cart_time, 
                                            cart_qty, 
                                            cart_money,  
                                            key_date, 
                                            key_time
                                            )
                                            VALUES (
                                            '" . $_SESSION['cart_id']. "',
                                            '" . $_SESSION['user_id']. "',
                                            '".$date."',
                                            '".$time."',
                                            '" . $_SESSION['cart_qty']. "',
                                            '" . $_SESSION['cart_money'] . "',
                                            '".$date."',
                                            '".$time."'
                                            ) ";
        $res_update = $db->query($sql_update);
    }
    echo "<script>window.location='cart_add_item.php?product_id=".$_GET['product_id']."';</script>";
?>