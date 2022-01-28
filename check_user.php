<?php
session_start();
include "connector.php";

$sql_u = "SELECT * FROM user WHERE user_name = '" . $_POST['username'] . "' ";
$res_u = $db->query($sql_u);
$u_array = $res_u->fetch(PDO::FETCH_ASSOC);

if ($u_array['user_pwd'] == $_POST['password']) {

    $_SESSION['user_id'] = $u_array['user_id'];
    $_SESSION['user_name'] = $u_array['user_name'];
    $_SESSION['user_level'] = $u_array['user_level'];
    $_SESSION['login_date'] = date('Y-m-d');

    $sql_insert = "  INSERT INTO report_user (
                rep_count,
                rep_date,
                rep_time,
                rep_user,
                report_user_level,
                user_id
            )
    VALUES  
            (
                '" . 1 . "',
                '" .date('Y-m-d'). "',
                '" .date("H:i:s")."',
                '" . $u_array['user_name'] . "',
                '" . $u_array['user_level'] . "',
                '" . $u_array['user_id'] . "'
            )
    ";
    $res_update = $db->query($sql_insert)
?>
    <script>
        window.location = "index.php";
    </script>
<?php
} else {
?>
    <script>
        window.alert("Your Username or Password invalid!");
        window.history.back();
    </script>
<?php
}
?>