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
if(isset($_POST['updateuser'])){
$user_id=$_POST['user_id'];
$user_name=$_POST['user_name'];
$user_age=$_POST['user_age'];
$user_phone=$_POST['user_phone'];
$user_email=$_POST['user_email'];
$user_addr=$_POST['user_address'];


if($user_name!== ''  && $user_age!== ''  && $user_phone!== ''  && $user_email!== '' ){
$querypass="SELECT * FROM users WHERE id=$user_id";
$querypass_run=mysqli_query($conn,$querypass);

$queryup="UPDATE  users SET name='$user_name',age='$user_age',phone='$user_phone',email='$user_email',u_addr='$user_addr' WHERE id='$user_id' ";
$queryup_run=mysqli_query($conn,$queryup);

if($queryup_run){
   
    $_SESSION['status']="Updated Sucessfully  ";
    header("Location:EditProfile.php");
    
}else{
    $_SESSION['status']=" UnSucessfully  ";
    header("Location:EditProfile.php");
}
}
}else{
    $_SESSION['status']="The fields cannot be Empty  ";
    header("Location:EditProfile.php");
}






if(isset($_POST['submitplaces'])){
    $name=$_POST['p_name'];
    $p_prov=$_POST['provinces'];
    $p_longitude=$_POST['p_longitude'];
    $p_description=$_POST['p_description'];
    $p_latitude=$_POST['p_latitude'];
 
    
   



 $query="INSERT INTO u_places(p_name,p_longitude,p_latitude,p_discription,p_image,p_prov) 
 VALUES('$name','$p_longitude','$p_latitude','$$p_description','$p_img','$p_prov')";
 $query_run=mysqli_query($conn,$query);
 if($query_run){
     
     header("Location: AddPlaces.php");
     }
     else
     {
     $_SESSION['status']=" failed";
     header("Location: AddPlaces.php");
     }
 
    }


    if(isset($_POST['submitProfile'])){
        $user_id=$_POST['user_id'];
        echo $user_id;
       /*
        $profile=$_FILES['p_img']['name'];
        $query="UPDATE users SET user_image='$profile'  WHERE id='$user_id' ";
        $query_run=mysqli_query($conn,$query);
        if($query_run){
            move_uploaded_file($_FILES["p_img"]["tmp_name"],"user_images/".$_FILES["p_img"]["name"]);
            $_SESSION['status']=" sucess";
            header("Location: Profile.php");
        }
        else{
            $_SESSION['status']=" Faile to upload Profile";
            header("Location: Profile.php");
        }
*/
    }




    
?>
