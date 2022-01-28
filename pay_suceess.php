<?php
    include "connector.php" ; 

 $sql_update=" UPDATE cart 
 SET 
    cart_paid = '".'Y'."' 
 WHERE
     cart_id = '".$_GET['cart_id']."' ";

if($res_update = $db->query($sql_update) )
     {
         ?>
             <script>
                 alert ("You Are Payment Successful !!!");
                 window.location="index.php";
             </script>
         <?php
     }
?>