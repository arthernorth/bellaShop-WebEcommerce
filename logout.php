<?php
    session_start();
    include "connector.php";

    $sql_out = " SELECT * FROM report_user ORDER BY rep_id DESC LIMIT 1 " ;
    $res_out = $db->query($sql_out);
    $data_arr = $res_out->fetch(PDO::FETCH_ASSOC);
    $sql_update = "UPDATE report_user SET rep_timeout =  '" .date("H:i:s")."'
                   WHERE rep_id = '" . $data_arr['rep_id'] . "' ";
    $res_update = $db->query($sql_update);

    session_destroy();
?>
<script>
    window.location="index.php";
</script>