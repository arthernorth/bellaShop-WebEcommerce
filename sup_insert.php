<?php
include "connector.php";
session_start();
if ($_SESSION['user_level'] == 'admin') {
    $sql_insert = "  INSERT INTO sup (
            sup_name,
            sup_contact,
            sup_add,
            sup_tel
        )
VALUES  
        (
            '" . $_POST['sup_name'] . "',
            '" . $_POST['sup_contact'] . "',
            '" . $_POST['sup_add'] . "',
            '" . $_POST['sup_tel'] . "'
        )
";


    if ($res_update = $db->query($sql_insert)) {
?>
        <script>
            alert("Add supplier Sucessfully!!");
            window.location = "sup_list.php";
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
} 
?>