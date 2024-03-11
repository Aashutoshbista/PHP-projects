<?php
include "../database.php";
session_start();
if(isset($_GET['token'])){
    $token=$_GET['token'];
    $verify="SELECT verificationcode,verify_status FROM user WHERE verificationcode='$token' LIMIT 1";
    $verify_run=mysqli_query($conn,$verify);
    if(mysqli_num_rows($verify_run)>0){
        $row=mysqli_fetch_array($verify_run);
        
        if($row['verify_status']==0){
            $clicked_token=$row['verify_token'];
            $update_query="UPDATE user SET verify_status='1' WHERE verificationcode='$token'LIMIT 1";
            $update_query_run=mysqli_query($conn,$update_query);
            if($update_query){
                $_SESSION['status']="Your account has been verified sucessfully!";
                header("Location:login.php");
                exit(0);

            }else{
                $_SESSION['status']="Failed";
            header("Location:login.php");
            exit(0);

            }
        }else{
            $_SESSION['status']="Email already verified Please login";
            header("Location:login.php");
            exit(0);
        }
    }else{
        $_SESSION['status']="This token doesnot Exists";
    header("Location:login.php");

    }
}else{
    $_SESSION['status']="Not Allowed";
    header("Location:login.php");
}


?>