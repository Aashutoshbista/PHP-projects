<?php include "connection.php";?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	session_start();

		include "connection.php";

		if (isset($_POST['submittone'])){
			foreach ($_SESSION["cart"] as $key => $value) {
                        
	
				//$one = $value["product_id"];
			   	//$two = $value["item_name"];
			   	//$twoo = $value["item_name"];
			   	//$three = $value["product_price"];
			   	//$four = $value["item_quantity"];
			   	//$five = $value["item_quantity"] * $three;
			   	//$query1 = "INSERT INTO `ctable` (`order_no`, `cname`, `ctotal`, `status`, `o_date`) VALUES (NULL, '$two', '$three', '0', '$one')";
			}
				$one = date("Y/m/d");
				$two = "Ram"; // session value of the users
				//$three = "1";
				$five = $_POST['itotal'];
 		 
			   
			   	//echo "$five";
		 	//echo $value["item_name"];
		 	//echo "$five**";
		 		//echo "$two**";
		 		//	echo "$four**";
		 		//echo "$three***";
		 		$query1 = "INSERT INTO `ctable` (`order_no`, `cname`, `ctotal`, `status`, `o_date`) VALUES (NULL, '$two', '$five', '0', '$one')";
				
		 		if(mysqli_query($conn,$query1)){
		 			echo "ACCOUNT CREATED SUCESSFULLY";
		 		}else{
		 		    echo "FAIL TO CREATE ACCOUNT";

		 	}
		}

	 ?>

<div style="height:300px;">
	<h3>Pay With</h3>
		<ul>
			<li>
			<form action="https://uat.esewa.com.np/epay/main" method="POST">
				<input value="<?php echo $five;?>" name="tAmt" type="hidden">
				<input value="<?php echo $five;?>" name="amt" type="hidden">
				<!--<input value="900" name="tAmt" type="hidden">
				<input value="200" name="amt" type="hidden">-->
				<input value="0" name="txAmt" type="hidden">
				<input value="0" name="psc" type="hidden">
				<input value="0" name="pdc" type="hidden">
				<input value="epay_payment" name="scd" type="hidden">
				<input value="<?php echo $order_no;?>" name="pid" type="hidden">
				<input value="http://localhost/html/esewa/esewa_payment_success.php" type="hidden" name="su">
				<input value="http://localhost/html//esewa_sucess.php" type="hidden" name="fu">
				<input type="image" src="image/esewa.png">
				</li>
				<li class="list-group-item"><input type="image" src="image/fonepay.png"></li>
				<li class="list-group-item"><input type="image" src="image/khalti.png"></li>
				<li class="list-group-item"><input type="image" src="image/connectips.png"></li>
				<li class="list-group-item"><input type="image" src="image/hbl.png"></li>
		</ul>
</div>
								
						
</body>
</html>