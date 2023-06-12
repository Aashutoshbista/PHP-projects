<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	<?php
	session_start();
		
		include('admin/config/dbcon.php');
        $emptyerror='';
        $validname= $validmail =$validpass=$validphone=$validage='';
        if(isset($_POST['submit'])){
           
         
            $name = $_POST['name'];
            $email = $_POST['email'];
           $age=$_POST['age'];
           $country=$_POST['nationality'];
            $pass1 = $_POST['pass'];
            $pass2 = $_POST['repass'];
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
           $phone=$_POST['phone'];
           $selectedTags=$_POST["Tags"];
           $tags=implode(",",$selectedTags);
          
       
/*
           echo $name;
           echo $email;
           echo $age;
           echo $country;
           echo $pass1;
           echo $pass2;
           echo $phone;
         if(isset($_POST['Tags'])){
        $selectedTags=$_POST["Tags"];
        foreach ($selectedTags as $tags) {
            echo "selected tags".$tags."<br>";
        }
       

    }
 */

                        $validpass = md5($pass1);
                        
                        
                            
                            $query="INSERT INTO users(name,email,password,role_as,phone,age,country,tags) VALUES('$name','$email','$validpass','0','$phone','$age','$country','$tags')";
                           
                           
                       
                        if (mysqli_query($conn,$query)) {
                         
                            $_SESSION['status']="ACCOUNT CREATED SUCESSFULLY";
                            header("Location:signup.php");
                        }else{
                            
                            $_SESSION['status']="FAIL TO CREATE ACCOUNT";
                            header("Location:signuo.php");
                        }
                   }
       
            
       
        

        
        mysqli_close($conn);
       
    ?>
    </body>
</html>