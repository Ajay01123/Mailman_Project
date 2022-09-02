<?php
require '../php/username.php';


if(isset($_POST['send']))
{
    $remail=$_POST['remail'];
    //$result=$obj->send($remail);
    $query="SELECT * FROM `Register_tb`where `recovery_email`='$remail'";
 
   $result=mysqli_query($connect,$query);
   
   if($result)
   {
    
        if(mysqli_num_rows($result)==1)
        {
                $reset_token= bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/kolkata'); 
                $date=date("Y-m-d");
                $query="UPDATE `Register_tb` SET `reset_token` =' $reset_token',`reset_date`=' $date'  WHERE `recovery_email`='$remail'";
                if(mysqli_query($connect,$query)  &&  SendMail($remail, $reset_token))
                {
                        echo "password reset done to mail";
                }
                else{
                    echo "server done";
                }
        }
        else{
                echo "invailed email";
        }
    }
   else{
    echo "not";
   }

}





?>