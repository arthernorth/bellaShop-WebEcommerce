<?php
    session_start();
    include "connector.php";
?>

<?php
    //echo "-->".$_GET['item_id'];
    $the_date = date('Y-m-d');
    $the_time = date("H:i:s");

    if(isset($_POST['buy_id']))
    {
    
        $sql_show = "   SELECT *  FROM buy_item 
                        WHERE product_id = '" . $_POST['product_id'] . "' 
                        AND     buy_id = '".$_POST['buy_id']."'";
        $res_show = $db->query($sql_show);
        $show_array = $res_show->fetch(PDO::FETCH_ASSOC);

        if(!isset($show_array['product_id']))
        {
            // แล้วทำการบันทึกข้อมูลลงตาราง สินค้าในเอกสาร buy_item
            $sql_update =    "INSERT INTO buy_item (
                                                buy_id,
                                                product_id,
                                                price,
                                                qty
                                                )
                                                VALUES (
                                                '" . $_POST['buy_id']. "',
                                                '" . $_POST['product_id']. "',
                                                '" . $_POST['price']. "',
                                                '" . $_POST['qty']. "'
                                                ) ";

        }
        else
        {
            // ถ้ามีสินค้าที่เลือกในเอกสารอยู่แล้ว (โดยปรกติ)ก็จะเพิ่มสินค้า ตามจำนวนที่ส่งมา  qty+'" . $_POST['qty']
            
            $sql_update = "	UPDATE buy_item 
                            SET	    qty = qty+'" . $_POST['qty'] . "',
                                    price = '" . $_POST['price'] . "'
                            WHERE	buy_id = '" .  $_POST['buy_id'] . "'
                            AND     product_id = '" . $_POST['product_id'] . "' 
                            "; 
        }

        $res_update = $db->query($sql_update);

        if($res_update)
        {
            // เขียน Agregation QUERY คำนวนยอดรวม
            $sql_sum = "    SELECT  SUM(qty) AS sqty,
                                    SUM(qty*price) AS smoney
                            FROM    buy_item 
                            WHERE   buy_id = '".$_POST['buy_id']."'";
            $res_sum=$db->query($sql_sum);
            $sum_array=$res_sum->fetch(PDO::FETCH_ASSOC);

            $sql_update2 = "	UPDATE buy
                                SET	buy_qty = '" .  $sum_array['sqty'] . "',
                                    buy_money = '" .  $sum_array['smoney'] . "',
                                    key_date = '" . $the_date . "',
                                    key_time = '" . $the_time . "'
                                WHERE	buy_id = '" .  $_POST['buy_id'] . "' 
                            "; 
            $res_update2 = $db->query($sql_update2);
            
            
        }
        // เสร็จแล้วก็แสดงข้อมูลเอกสาร ระบุ id ของตัว Master ด้วย
        echo "<script>window.location='buy_show.php?buy_id=".$_POST['buy_id']."';</script>";

    }   
?>

