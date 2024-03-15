<?php 

session_start();
	//print_r($_SESSION['cart']);

if(isset($_POST["remove"])){
	//$_SESSION['cart'] = array_values($_SESSION['cart']);
	foreach ($_SESSION['cart'] as $key => $value) {
		//sprint_r($key);
		if($value['product_id'] == $_POST['item_num']){
			//echo "hello";
			unset($_SESSION['cart'][$key]);
			//$_SESSION['cart'] = array_values($_SESSION['cart']);
			echo'<script>alert("Item removed")</script>';
			echo '<script>window.location="bill.php"</script>';
		}	
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
table, th, tr{
     text-align: center;
    }
.title2{
    text-align: center;
    color: #66afe9;
    background-color: #efefef;
  	padding: 2%;
    }
h2{
    text-align: center;
    color: #66afe9;
    background-color: #efefef;
    padding: 1%;
    }
table th{
    background-color: #efefef;
    }
input[type=text] {
  width: 50%;
  margin-left:80px;
  margin-bottom:16px;
  padding:10px;
  border: 1px solid black;
  border-radius: 3px;
}
input[type=submit]{ 
cursor: pointer; 
box-sizing:border-box;
font: 18px Calibri;
width:100%;
background-color:grey;
}
label {
  margin-left:80px;
  font-family:sans-serif;
  font-size:24px;
}
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 13px;
  margin-left:20px;
  border: none;
  width: 80%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
h3{
    text-align: center;
    color: #66afe9;
    font-size:22px;

}
p{
	text-align: center;
	color: #66afe9;
    font-size:18px;
    padding:0%;
 
}
input[type=radio]{
	border: 5px solid #0DFF92;
	transform: scale(1.2);
}	
</style>
</head>
<body>
	<div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        
        <div class="table-responsive" style="background-color:lightgrey;">
            <table class="table table-bordered" style="margin-left:18%;">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
                <th width="10%"><a class="btn1 btn-primary title2" href="index.php"><button>Home</button></a></th>
            </tr>
            <tr>
            
            </tr>
            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td>
                            	<form method="POST" action="bill.php">
                            		<button name="remove">Remove</button>
                            		<input type="hidden" name="item_num" value="<?php echo $value["product_id"];?>">
                            	</form>
                            </td>

                        </tr>
                        <?php
                        	$total = $total + ($value["item_quantity"] * $value["product_price"]);
                    	} 
                    	?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>                                   
                        	<td></td><!--number format function is inbuilt function that display number in format of number with .00(two decimal)-->
                        </tr>
                        <tr>
                        	<td colspan="4" align="center">
                                <form method="POST" action="checkOutt.php" >
                                    <input type="submit" name="submittone">
                                </form>
                

                        	</td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
     
    <div class="Checkout"  id="checkout" style="height:580px;padding:10px;background-color:lightgrey;">
       	<div class="cash" style="width:50%; height:100%; background-color:lightgrey;float:left;">
        	<h2><input type="radio" name="radiobutton" onclick="myFunction()">Cash On Delivery</h2>
			<form method="POST" action="ShowUp.php">
				<div style="height:60%;background-color:lightgrey;">
   					<label>Your Name</label><br>
   					<input type="text" id="namee" name="name" placeholder="Enter your name" required><br>
  					<label>Address</label><br>
        			<input type="text" name="address" id="cadd"  required><br>
        			<label>Phone Number</label><br>
        			<input type="text" name="num" id="cph" required><br>
        			<label>Email</label><br>
        			<input type="text" name="email"  id="cemail" required><br>
        		</div>
        		<div style="background-color:lightgrey;height:23%;">
        			<div style="height:50%;float:left;">
        				<label>Province</label><br>
        				<input type="text" name="province" id="cprov"  required><br>
        			</div>
        			<div style="height:50%;float:left;">
        				<label>Zip</label><br>
        				<input type="text" name="zip"  id="czip"  required><br>
        			</div>
        		</div>
        		<div style=" background-color:lightgrey;">
					<input type="submit" id="submit" name="cashOn" value="Checkout Now " disabled />
				</div>
        	</form>
        </div>
   		<div class="online" style="width:50%; height:100%; background-color:lightgrey;float:left;">
        		<h2><input type="radio" name="radiobutton" onclick="myFunction1()">Online Payment</h2>
                <h3>Pay With</h3>
        <ul>
            <li>
            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                <input value="<?php echo $total;?>" name="tAmt" type="hidden">
                <input value="<?php echo $total;?>" name="amt" type="hidden">
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
    
        </ul>
                <!--<div>
                    <input type="submit" value="Checkout Now" id="submit1"  disabled>
                    <input type="submit" name="submittone" style="margin-top: 5px;" class="btn btn-success" value="Check Out">
                </div>-->




        		<!--<form method="POST" action="ShowUp.php">
        			<div style="background-color:blue;height:60%;">
        				<h3>Card Accepted</h3>
        				<p>Card issued by bank registered under Nepal Rastra Bank.</p>
        				<label>Name On Card</label><br>
        				<input type="text" name="pname"  id="noc"  required><br>
        				<label>Email</label><br>
        				<input type="text" name="emailc" id="eoc"  required><br>
        				<label>Credit Card Number</label><br>
        				<input type="text" name="cardnum" id="ccnum" required><br>
        			</div>
        			<div style="background-color:purple;height:22.5%">
        				<div style="height:50%;float:left;">
        					<label>Exp Year</label><br>
        					<input type="text" name="cardExp" id="cexp"   required><br>
        				</div>
        				<div style="height:50%;float:left;">
        					<label>Cw</label><br>
        					<input type="text" name="cardCW" id="ccw"  required><br>
        				</div>
        			</div>
        			<div>
        				<input type="submit" value="Checkout Now" id="submit1"  disabled>
        			</div>
        		</form>-->
                <form method="POST" action="payOption.php">
                                    <input type="hidden" name="pid" value="<?php echo $value["product_id"]  ?>">
                            
                                    <!--<input type="hidden" name="hname" value="<?php echo $value["item_name"]; ?>">
                                    <input type="hidden" name="hpprice" value="<?php echo $value["product_price"]; ?>">
                                    <input type="hidden" name="iquantity" value="<?php echo $value["item_quantity"]; ?>">-->

                                    <input type="hidden" name="itotal" value="<?php echo number_format($total, 2);  ?>">       
                                    <!--<input type="submit" name="submittone" style="margin-top: 5px;" class="btn btn-success"
                                    value="Check Out">-->
                                       
                                    <!--<input class="form-check-input" type="radio" name="choice"  id="cash" value="option1" >
                                    <label class="form-check-label" for="cash">Cash On Delivery</label><br>
                                
                            
                                    <input class="form-check-input" type="radio" name="choice"   id="online" value="option2">
                                    <label class="form-check-label"  for="online">Online Payment</label>-->
                                    <?php //echo $value["product_price"];?>

                                </form>
        </div>
    </div>        

</body>
<script type="text/javascript">
function myFunction() {


	var bt = document.getElementById('submit');
	bt.disabled = false;
	document.getElementById('submit1').style.display='none';
	document.getElementById('submit').style.display='';
}
 function myFunction1() {


	var bt = document.getElementById('submit1');
	bt.disabled = false;
	document.getElementById('submit1').style.display='';
	document.getElementById('submit').style.display='none';
}

    </script>
</html>