<?php        
include('database.php');
session_start();


if(isset($_POST['logout_btn'])){
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status']="Logged out sucessfully";
    header("Location:admin/login.php");
    exit(0);

}



   
   

    if(isset($_POST['submitnewsletter'])){
       echo"hello world";


    }



/*
*/
if(isset($_SESSION['auth_user']['user_id']) && $_SESSION['auth']=="0") {
    if(isset($_POST['ChangePassword'])){
        $user=$_SESSION['auth_user']['user_id'];
        $new=$_POST['new_pass'];
        $old=$_POST['old_pass'];
        
        
       $querypass="SELECT password FROM users WHERE id=$user";
        $querypass_run=mysqli_query($conn,$querypass);
        if($querypass){
            foreach($querypass_run as $row){
           
               
           
            if($row['password']==$old){
                           
                            
                                if($new==$old){
                                    $_SESSION['status']="password cannot be same as previous";
                                    header("Location:change-password.php");
            
            
                                }
                                else{
                                    $queryupdate="UPDATE  users SET  password='$new' WHERE id='$user'";
                                    $queryupdate_run = mysqli_query($conn,$queryupdate);
                                    if($queryupdate_run)
                                    {
                                        $_SESSION['status']="password updated sucessfully";
                                        header("Location: ChangePassword.php");
                                    }
                                    else{
                                        $_SESSION['status']="password update failed";
                                        header("Location:ChangePassword.php");
                                    }
            
                                
                    
                        }
                    }
                    
            else{
                $_SESSION['status']="password didnot match the old password ";
                header("Location: ChangePassword.php");
                
            }

        }
    }
}
}







?>
