<?php
	session_start();
	include 'connector.php';
?>

<?php
    $sql_del = "DELETE FROM user 
                WHERE 	user_id = '".$_GET['user_id']."' ";   
    $res_del = $db->query($sql_del);
    if($res_del)
    {
        echo "<script>window.location='admin_edit.php'</script>";
    }
?>

