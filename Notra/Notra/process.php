<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

	<?php
		include "signupdemo.php";
		include('admin/config/dbcon.php');
		$emptyerror='';
		/*$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "projectone";

		$conn = mysqli_connect($host,$user,$password,"$dbname");*/
		/*if($conn){
			echo "Connected to localhost";
		}else{
			echo "Failed to connect to lcalhost";
		}
*/
		//Getting data from signup.php 
		

		 $validname= $validmail =$validpass='';


		 if (isset($_POST['adduser'])){
		 	$name = $_POST['name'];
		 	$email = $_POST['email'];
			$age=$_POST['age'];
			$country=$_POST['country'];
		 	$pass1 = $_POST['password'];
		 	$pass2 = $_POST['password'];
		 	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
			$phone=$_POST['phone'];
		 

		 	if(empty($name)){
		 		$emptyerror ="<br>Name filed can't be empty";
		 		   //die('Password and Confirm password should match!');
		 	}elseif(!preg_match ("/^[a-zA-z]*$/", $name)){
		 		$emptyerror = $emptyerror ."<br> Olny alphabet white space is allowed ";
	
		 		
		 	}else{
		 		$validname = $name;

		 	} 

		 	if(empty($email)){
		 		$emptyerror =$emptyerror ."<br> Email field can't be empty";

		 	}elseif(!preg_match ($pattern, $email)){
		 		$emptyerror = $emptyerror ."<br> Invalid Email";
		
		 	}else{
		 		$validmail = $email;
		 	}

			//for age
			



		 	if(empty($pass1)){
		 		$emptyerror = $emptyerror ." <br>Password field can't be empty";
		 	
		 	}elseif(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/",$pass1)){#reg from stackoveflow
		 		$emptyerror= $emptyerror ."<br>Password must include alphanumeric value one upperclass,one special charcter";
		 		}elseif (empty($pass2)) {
		 		$emptyerror = $emptyerror."<br>Confirm your password";
		 	

		 	}elseif($pass1 == $pass2){
		 		//$validpass = mysqli_real_escape_string($pass1);
		 		$validpass = md5($pass1);
		 		//$validpass = $pass1;
		 		//$validpass = password_hash($pass1,PASSWORD_DEFAULT);
               //validpass = $pass1;
		 	}else{
		    	return true;
		 	}

		 	//query inserting to database
		 	//$sql = "INSERT INTO book(name,email,pass) VALUES('$validname','$validmail','$validpass')";
		 	if($emptyerror==''){
		 		$query="INSERT INTO users(name,email,password,role_as,age,country,phone) VALUES('$validname','$validmail','$validpass','0',$age,$country,'$phone')";
		 		if (mysqli_query($conn,$query)) {
		 			
					 $_SESSION['status']="ACCOUNT CREATED SUCESSFULLY";
					 header("Location: admin/login.php");
		 		}else{
		 		    
					 $_SESSION['status']="FAIL TO CREATE ACCOUNT";
					 header("Location: signupdemo.php");
		 		}
			}else{
				echo $emptyerror;

				echo"<a href='signupdemo.php'><br>TRY AGAIN</a>";
			}

		 }
		 mysqli_close($conn);





		

	  ?>
	 
		
</body>
</html>
