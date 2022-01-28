<?php
session_start();
include "connector.php";

$sql_update = " UPDATE user 
                        SET user_id = '" . $_POST['id'] . "' ,
                            user_name= '" . $_POST['username'] . "' ,
                            user_pwd = '" . $_POST['password'] . "' ,
                            user_level = '" . $_POST['level'] . "' ,
                            email = '" . $_POST['email'] . "' ,
                            user_phone = '" . $_POST['phone'] . "' 
                        WHERE
                            user_id = '" . $_POST['id'] . "' ";
if ($res_update = $db->query($sql_update)) {
?>
    <script>
        alert("update user Sucessfully!!");
        window.location = "admin_edit.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Have Something wrong!!");
        window.history.back();
    </script>
<?php
}



?>