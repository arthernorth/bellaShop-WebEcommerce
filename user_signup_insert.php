<?php
session_start();
include "connector.php";

if ($_POST['password'] == $_POST['Cpassword']) {
    $sql_insert = "  INSERT INTO user (
            user_name,
            user_pwd,
            user_level,
            email,
            user_phone,
            user_pic
        )
VALUES  
        (
            '" . $_POST['username'] . "',
            '" . $_POST['password'] . "',
            'user',
            '" . $_POST['email'] . "',
            '" . $_POST['phone'] . "',
            'images/new_user.png'
        )
";


    if ($res_update = $db->query($sql_insert)) {
?>
        <script>
            alert("Sign Up Sucessfully!!");
            window.location = "login.php";
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
} else {
    ?>
    <script>
        alert("Password not match!!");
        window.history.back();
    </script>
<?php
}



?>