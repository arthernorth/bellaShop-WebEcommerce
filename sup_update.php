<?php
session_start();
include "connector.php";

$sql_update = " UPDATE sup 
                        SET sup_id = '" . $_POST['id'] . "' ,
                            sup_name= '" . $_POST['sup_name'] . "' ,
                            sup_contact = '" . $_POST['sup_contact'] . "' ,
                            sup_add = '" . $_POST['sup_add'] . "' ,
                            sup_tel = '" . $_POST['sup_tel'] . "' 
                        WHERE
                            sup_id = '" . $_POST['id'] . "' ";


if ($res_update = $db->query($sql_update)) {
?>
    <script>
        alert("Saving Sucessfully!!");
        window.location = "sup_list.php";
    </script>
<?php
}

?>