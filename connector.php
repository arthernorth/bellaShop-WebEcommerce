<?php
    date_default_timezone_set('Asia/Bangkok');
    $host = "158.108.101.25";
    $user = "bellarootshop";
    $pwd = "149814";
    $dbname = "bella_shop";
    $dsn ="mysql:host=$host;dbname=$dbname";
    try
    {
        $db=new PDO($dsn,$user,$pwd);
        $db->query("SET NAMES UTF8");
    }
    catch(PDOException $e)
    {
        echo "Error".$e->getMessage();
    }

?>