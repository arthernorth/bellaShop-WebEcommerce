<?php
	session_start();
	include 'connector.php';
?>

<?php
    $sql_del = "DELETE FROM sup 
                WHERE 	sup_id = '".$_GET['sup_id']."' ";   
    $res_del = $db->query($sql_del);
    if($res_del)
    {   
        echo "<script>window.location='sup_list.php'</script>";
    }
?>

