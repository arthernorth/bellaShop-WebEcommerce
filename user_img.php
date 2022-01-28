<?php
    session_start();
    include 'connector.php';

    ini_set('memory_limit', '30M'); 
	$theFile=basename($_FILES['user_pic']['name']); 
	$uploaddir = 'images/'; 
	$uploadfile = $uploaddir.$_POST['id'].".jpg"; 
	if (move_uploaded_file($_FILES['user_pic']['tmp_name'], $uploadfile)) {
        $sql_update=" UPDATE user 
                        SET user_pic= '".$uploadfile."'
                        WHERE
                            user_id = '".$_POST['id']."' ";
        if($res_update = $db->query($sql_update)){
             ?>
            <script>
                alert ("you upload image sucessfully");
                window.location="user_profile.php?user_id=<?=$_POST['id']?>"
            </script>	
            <?php
        }else{
            ?>
            <script>
			    alert ("Upload failed, please try again!!");
			    window.history.back();
		    </script>
        <?php	
        }
    } 

?>