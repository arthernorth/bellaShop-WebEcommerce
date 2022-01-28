<?php
    include "connector.php" ; 
    $sql_data = "   SELECT * 
    FROM cart 
    WHERE cart_id != '' 
    AND cart_id = '" . $_GET['cart_id'] . "'
    AND cart_cf  = 'Y'
    ";  
    $res_data = $db->query($sql_data);  
    $data_array = $res_data->fetch(PDO::FETCH_ASSOC);

 if($data_array['cart_paid'] == 'Y'){
    $sql_update=" UPDATE cart 
    SET 
       cart_sent = '".'Y'."' 
    WHERE
        cart_id = '".$_GET['cart_id']."' ";
 }else{
    ?>
    <script>
        alert ("!!! You're not paid yet, You shoud to pay after !!!");
        window.location="user_payment.php";
    </script>
<?php
}


if($res_update = $db->query($sql_update) )
     {
         ?>
             <script>
                 alert ("!!! Thank you for using Bella Shop. !!!");
                 window.location="index.php";
             </script>
         <?php
     }
?>