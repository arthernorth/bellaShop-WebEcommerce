<?php
    session_start();
    include "connector.php";

    if($_POST['password']==$_POST['Cpassword'])
    {
            $sql_update=" UPDATE user 
                        SET user_id = '".$_POST['id']."' ,
                            user_name= '".$_POST['username']."' ,
                            user_pwd = '".$_POST['password']."' ,
                            user_level = '".$_POST['level']."' ,
                            email = '".$_POST['email']."' ,
                            user_phone = '".$_POST['phone']."' 
                        WHERE
                            user_id = '".$_POST['id']."' ";
        
        
        if($res_update = $db->query($sql_update) )
        {
            // echo $sql_update;
            $_SESSION['user_id']=$_POST['id'];
            $_SESSION['user_name']=$_POST['username'];
            ?>
                <script>
                    alert ("Saving Sucessfully!!");
                    window.location="user_profile.php?user_name=<?=$_POST['username']?>";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert ("Have Something wrong!!");
                    window.history.back();
                </script>
            <?php
        }
    }
    else
    {
        ?>
            <script>
                alert ("Password not match!!");
                window.history.back();
            </script>
        <?php
    }

    

?>