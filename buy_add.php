<?php
    session_start();
    include "connector.php";
?>

<?php
    $the_date = date('Y-m-d');
    $the_time = date("H:i:s");    

    $sql_master = "     SELECT *  FROM buy 
                        WHERE buy_id = '".$_POST['buy_id']."'";
    $res_master = $db->query($sql_master);
    $rowcnt=$res_master->rowCount();

    if($rowcnt==0 )
    {
        $i=0;
        do
        {
            $i++;
            $theid="B".date('ymd').substr("0{$i}", -2);
            $chk_row="SELECT * FROM buy WHERE buy_id = '".$theid."' ";
            $res_row=$db->query($chk_row);
            $cnt=$res_row->rowCount();
        }while($cnt>0);
        $buy_id =$theid;
        $sql_update =    "INSERT INTO buy (
                                            buy_id,
                                            sup_id,
                                            buy_date,
                                            buy_qty,
                                            buy_money,
                                            key_date,
                                            key_time,
                                            key_id
                                            )
                                            VALUES (
                                            '" . $buy_id. "',
                                            '" . $_POST['sup_id']. "',
                                            '" . $_POST['buy_date']. "',
                                            '0',
                                            '0',
                                            '".$the_date."',
                                            '".$the_time."',
                                            '" .$_SESSION['user_id']. "'
                                            ) ";
    }   
    else
    {
        $sql_update="UPDATE buy SET sup_id = '".$_POST['sup_id']."',
                                    buy_date = '".$_POST['buy_date']."',
                                    key_date = '".$the_date."',
                                    key_time = '".$the_time."',
                                    key_id = '".$_SESSION['user_id']."' 
                    WHERE   buy_id = '".$_POST['buy_id']."' ";
        $buy_id = $_POST['buy_id'];
    }
    if($res_update = $db->query($sql_update))
    {
        echo "<script>window.location='buy_show.php?buy_id=".$buy_id."';</script>";
    }
    else
    {
        echo $sql_update;
    }
   
?>

