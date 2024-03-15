<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style type="text/css">
	.form{
		height:550px;
		background-color:brown;
		margin:0px 10px 0px;
		/*background-image:linear-gradient(to right,skyblue, white);*/
		background-image:url(image/lib.jpg);
		display-border:none;
	}
	h1{
		color:white;
		text-align:center;
		font-size:25px;
		font-family:Apple Chancery;
	}
	input{
		margin-left:30%;	
		margin-top:30px;
		padding:2px;
  		border-radius:10px;
	}
	input[type=submit]:hover{
		background-color:skyblue;
	}
	input[type=submit]{
		height:40px;
		width:150px;
		background-color:transparent;
		border:black solid 1.5px;
		cursor:pointer;
		transition-duration:0.4s;
		background-color:white;
	
	}
	input[type=text],[type=password]{
		height:40px;
		width:50%;
		border:black solid 1.5px;
	}
	p{
		text-align:center;
		font-size: 20px;
		font-family:Apple Chancery;
		font-weight:10px;
		color:white;
	}
	p a{
		color:white;
		background-color:transparent;
		text-decoration:none;
	}
	p a:hover{
		color:skyblue;
	}

	
</style>

</head>
<body>
<?php
require"connection.php";
session_start();
//If form submitted, insert values into the database.***https://www.allphptricks.com/
if (isset($_POST['submit'])){
        
 $username = $_POST['username'];;//// removes backslashes
        //escapes special characters in a string

 $password =$_POST['password'];
 //$passworden = md5($password);

 //echo $passworden;
 echo $password;
 echo $username;
 //echo "92e3226b2011a07b2fae44362";

 //Checking if user existing in the database or not
 $query = "SELECT * FROM user_info WHERE name='$username' and password='$password'";//'".md5($password)."'";
 $result = mysqli_query($conn,$query);
 //$rows = mysqli_num_rows($result);
 $rows = mysqli_fetch_array($result);
 //echo '$rows';
 //echo "heloo";
     //if($rows == 1){
if(is_array($rows)){
        $_SESSION['sname'] = $username;
            // Redirect user to index.php
        header("Location: signup.php");
        echo "hello";
        }else{
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
		<br/>Click here to <a href='login1.php'>Login</a></div>";

 }
    }else{
?>
<div class="form">
	<div style="height:50px;">
		<div style="float:left;padding-left: 45%;">
		<h2><img src="image/book.png" style="padding-top: 10px;"></h2>
		</div>
		<div style="padding-right:45%;padding-top:25px;">
			<h1>Notra</h1>
		</div>
	</div>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='signup.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>