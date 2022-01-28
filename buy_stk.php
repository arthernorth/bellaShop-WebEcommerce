<?php
	session_start();
	include 'connector.php';
?>

<?php
    $ok=0;
    $err=0;
    $sql_data = "SELECT * FROM buy_item WHERE buy_id = '".$_GET['buy_id']."' ";
    $res_data = $db->query($sql_data);
    while($data_array=$res_data->fetch(PDO::FETCH_ASSOC) )
    {
        $sql_update = " UPDATE products SET cur_stk = cur_stk + '".$data_array['qty']."' 
                        WHERE 	product_id = '".$data_array['product_id']."' ";   
        $res_update = $db->query($sql_update);
        if($res_update)
            $ok++;
        else
            $err++;
    }
    if($err==0)
    {
        $sql_update = " UPDATE buy SET buy_recv = 'Y' 
                        WHERE 	buy_id = '".$_GET['buy_id']."' ";   
        $res_update = $db->query($sql_update);
        echo "<script>window.location='buy_show.php?buy_id=".$_GET['buy_id']."'</script>";
    }
    else
    {
        ?>
                <script>
                    alert("ยืนยันรับ<?=$_GET['buy_id']?>ผิดพลาด");
                    window.history.back();
                </script>
        <?php        
    }
?>


    

