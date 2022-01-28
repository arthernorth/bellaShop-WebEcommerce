<?php 
include "connector.php";

$_POST['findtext'] = 'tools' ;
$sql_data = "SELECT * FROM products
WHERE product_id LIKE '%" . $_POST['findtext'] . "%' 
OR  product_id LIKE '%" . $_POST['findtext'] . "%' 
OR product_name LIKE '%" . $_POST['findtext'] . "%'
OR product_cat LIKE '%" . $_POST['findtext'] . "%' ";

$res_data = $db->query($sql_data);
$data_arr = $res_data->fetch(PDO::FETCH_ASSOC) ;
 
print_r($res_data)  ; 
?>