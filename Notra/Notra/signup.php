

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.form{
		height:600px;
		background-color:brown;
		margin:0px 150px 0px;
		background-image:linear-gradient(to right,red, white);
		/*background-image:url(image/lib4.jpg);*/
		border-radius:10px;
	}
	h1{
		color:white;
		text-align:center;
		font-size:25px;
		font-family:Consolas;
	}
	span{
		margin-left:25%;
		font-size:20px;
		font-family:Apple Chancery;
		color:white;

		
	}
	input{
		border-radius:10px;
	}
	input[type=submit]:hover{
		background-color:skyblue;
	}
	input[type=submit]{
		height:40px;
		font-size:17px;
		width:150px;
		margin-left:50%;
		background-color:transparent;
		border:black solid 1.5px;
		cursor:pointer;
		transition-duration:0.4s;
	
	}
	input[type=text],[type=password]{
		height:40px;
		width:40%;
		border:black solid 1.5px;
		background-color:transparent;
	}
	p{
		font-size:20px;
		font-family:Apple Chancery;
		margin-left:27%;
		color:white;
	}
	a button{
		text-align:center;
		font-size: 17px; 
		font-family:Apple Chancery;
		color:black;
		margin-left:52px;
		height:40px;
		width:150px;
		background-color:transparent;
		border:black solid 1.5px;
		border-radius:10px;
	}
	a button:hover{
		background-color:skyblue;
		text-decoration:none;
	}
	</style>
</head>
<body>
	
	    <?php           
		if(isset($_SESSION['status'])){
				echo"<h4>".$_SESSION['status']."</h4>";
				unset($_SESSION['status']);
		}
  ?>
	
	<div class="form">
	<h1>Registration Form</h1> 
		<form method="POST" action="process.php">
		<span>Name:<input type="text" name="name" style="margin-left:113px"></span><br><br>
		<span>Email:<input type="text" name="email" style="margin-left: 112px"></span><br><br>
		<span>Phone:<input type="text" name="phone" style="margin-left: 112px"></span><br><br>
		<span>Password:<input type="password" name="password" value="" style="margin-left:81px"></span><br><br>
		<span>Re-Enter Password:<input type="password" name="pasword" value="" style="margin-left:5px;"></span><br><br>
		<input type="submit" name="submit" value="Submit"><br><br>
		<!--<button>Login<a href="login.php"></a></button>-->
		
	</form>
	<p>Already Have Account?<a href="login1.php"><button>Log In</button></a></p>
</div>
<?php
//session_start();

//echo $_SESSION['sname'];
   ?>

</body>
</html>