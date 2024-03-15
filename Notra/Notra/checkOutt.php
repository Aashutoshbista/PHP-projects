<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <div style="height: 300px;background-color:white;">
		 	
		 	</div>
	<?php
	session_start();

	include ('database.php');
	$count = count($_SESSION["cart"]);
	// echo $count;


// if (isset($_POST['test'])){

// $first = $_POST['first'];
// for ($x = 1; $x <= $count; $x++) {
// echo $first;


	
	//echo "$count";
	if (isset($_POST['submittone'])){
	//for ($x = 1; $x <= $count; $x++) {
  //echo "The number is: $x <br>";
  		
		
			foreach ($_SESSION["cart"] as $key => $value) {
				$one = $value["product_id"];
			   	$two = $value["item_name"];
			   	$three = $value["product_price"];
			   	$four = $value["item_quantity"];
			   	$five = $value["item_quantity"] * $three;
				   $name=$_SESSION['auth_user']['user_id'];
				
			   
			  
			   
			   			  
			  $sql="INSERT INTO ctable ( cname, quantity, price, product_id,cust_id) 
			  VALUES ( '$two', '$four', '$three' ,'$one', '$name')";
			  //$sql= "INSERT INTO `ctable` (`cid`, `cname`, `quantity`, `price`, `product_id`, `status`, `cust_id`) VALUES (NULL, 'ram', '3', '34', '5', 'no', '44')";
			  $result=  mysqli_query($conn, $sql);
			  //echo $sql;
			  if($result==1){
				
				$query="SELECT quantity FROM items WHERE item_id=$one";
				$query_run=mysqli_query($conn,$query);


				if($query_run){
					
					$queryupdate="UPDATE items SET quantity=quantity-$four WHERE item_id =$one";
					$queryupdate_run=mysqli_query($conn,$queryupdate);
					if($queryupdate_run){
						$_SESSION['status']=" sucess";
						header("Location: index.php");

					}
					else{
						$_SESSION['status']=" Failuar";
						header("Location: index.php");


					}
					
					
				}

			  }else{
				echo "failure";
			  }

			}
			?><!-- 
<input type="submit" name="test" > -->
			   <!-- </form> -->
			   
<?php
			
		}
			//echo "$count";
				//$one = date("Y/m/d");
				//$five = $_POST['itotal'];
		 	//echo"$one**";
			   	 //echo count($onee);
			   
			   	//echo "$five";
		 	//echo $value["item_name"];
		 	//echo "$five**";
		 		//echo "$two**";
		 		//	echo "$four**";
		 				//echo "$three***";
				//$query1 = "INSERT INTO ctable (cid,cname,ctotal)VALUES('$one','','$five')";
			
				
		 		// <if(mysqli_query($conn,$query1)){
		 		// echo "ACCOUNT CREATED SUCESSFULLY";
		 		// }else{
		 		//  echo "FAIL TO CREATE ACCOUNT";

		 	//}
		//}

	 ?>
	 
</body>
</html>