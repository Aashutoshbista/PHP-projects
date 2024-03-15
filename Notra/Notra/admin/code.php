<?php
include('authentication.php');
include('config/dbcon.php');
if(isset($_POST['logout_btn'])){
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status']="Logged out sucessfully";
    header("Location:login.php");
    exit(0);

}


if(isset($_POST['addUser'])){
    $name=$_POST['name'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];


if($password == $confirmpassword){


    $checkemail="SELECT email FROM users WHERE email='$email'";
    $checkemail_run = mysqli_query($conn,$checkemail);
    if(mysqli_num_rows($checkemail_run) >0){
        //Already exist
        
        $_SESSION['status']="Email is alredy existed";
        header("Location: register.php");


    }
    else{

        $user_query="INSERT INTO users(name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
    
        $user_query_run = mysqli_query($conn,$user_query);
    
    
        if($user_query_run){
    
            $_SESSION['status']="User Added sucessfully";
            header("Location: register.php");
        }
        else
        {
            $_SESSION['status']="User registration fail";
            header("Location: register.php");
    
    
        }

    }


    

}

else{
    $_SESSION['status']="Password did not match";
    header("Location: register.php");

}
}

if(isset($_POST['updateuser']))
{
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role_as=$_POST['role_as'];


    $query="UPDATE  users SET  name='$name',phone='$phone',email='$email',password='$password',role_as='$role_as'  WHERE id='$user_id'";


    
    $query_run = mysqli_query($conn,$query);
    if($query_run){

            $_SESSION['status']="User updated sucessfully";
            header("Location: register.php");
            }
            else
            {
            $_SESSION['status']="User updated fail";
            header("Location: register.php");
            }

}
if(isset($_POST['DeleteUserbtn']))

{
    $userid=$_POST['delete_id'];
    $query="DELETE FROM users WHERE id='$userid'"; 
    $query_run = mysqli_query($conn,$query);
    if($query_run){

            $_SESSION['status']="User data deleted sucessfully";
            header("Location: register.php");
            }
            else
            {
            $_SESSION['status']="User data deleted fail";
            header("Location: register.php");
            }

}

/*here will be the back end code for category section*/



if(isset($_POST['addcatagory']))
{
    $name=$_POST['name'];
   

    $checkname="SELECT cat_name FROM catagories WHERE cat_name='$name'";
    $checkname_run = mysqli_query($conn,$checkname);
    if(mysqli_num_rows($checkname_run) >0){
        //Already exist
        
        $_SESSION['status']="Catagorie name is alredy Added";
        header("Location: category.php");
    }
    else{



    $user_query="INSERT INTO catagories(cat_name) VALUES ('$name')";
    $user_query_run = mysqli_query($conn,$user_query);

    if($user_query_run){
    
        $_SESSION['status']="Catagorie Added sucessfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status']="Catagorie added fail";
        header("Location: catagorie.php");


    }


    }
}
if(isset($_POST['updatecatagories']))
{
    $user_id=$_POST['cat_id'];
    $name=$_POST['name'];
   

    $query="UPDATE  catagories SET  cat_name='$name' WHERE cat_id='$user_id'";


    
    $query_run = mysqli_query($conn,$query);
    if($query_run){

            $_SESSION['status']="Catagory name updated sucessfully";
            header("Location: category.php");
            }
            else
            {
            $_SESSION['status']="Catagory name updated sucessfully";
            header("Location: category.php");
            }

        }
if(isset($_POST['Deletecatagory']))

{
    $cat_id=$_POST['delete_id'];
    $sql1="SELECT cat_name from catagories WHERE cat_id=$cat_id";
    $sql1_run=mysqli_query($conn,$sql1);
    $result=implode(mysqli_fetch_assoc( $sql1_run));

    if($sql1_run){
    $query="DELETE FROM catagories WHERE cat_id='$cat_id'"; 
    $query_run = mysqli_query($conn,$query);

        $sql="DELETE  FROM items WHERE item_cat='$result' ";
        $sql_run=mysqli_query($conn,$sql);
        
        if($query_run){
            $_SESSION['status']="Catagory deleted sucessfully";
        
            header("Location: category.php");
        }
        else
        {
        $_SESSION['status']="Catagory name deleted fail";
        header("Location: category.php");
        }
       
    }
    else
    {
    $_SESSION['status']="Catagory can not be selected";
    header("Location: category.php");
    }


   



   
   
 
    
   
    
/*



    $sql="DELETE * FROM items WHERE item_cat=$result ";
    $sql_run=mysqli_query($conn,$sql);
   

      
    if($query_run){
        
        if($sql_run){
            $_SESSION['status']="Catagory deleted sucessfully";
        
            header("Location: category.php");
        }
        else{
            $_SESSION['status']="Catagory Not deleted  in product";
            header("Location: category.php");
        }
    }
    else
    {
    $_SESSION['status']="Catagory name deleted fail";
    header("Location: category.php");
    }

    
   
  
*/

}
//change password code

    if(isset($_SESSION['auth_user']['user_id']) && $_SESSION['auth']=="1") {
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
                                            header("Location: change-password.php");
                                        }
                                        else{
                                            $_SESSION['status']="password update failed";
                                            header("Location: change-password.php");
                                        }
                
                                    
                        
                            }
                        }
                        
                else{
                    $_SESSION['status']="password didnot match the old password ";
                    header("Location: change-password.php");
                    
                }

            }
        }
    }
    }
?>





   
    