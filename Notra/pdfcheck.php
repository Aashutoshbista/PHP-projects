<?php 
session_start();
include('database.php');
	//print_r($_SESSION['cart']);

if(isset($_POST["remove"])){
	//$_SESSION['cart'] = array_values($_SESSION['cart']);
	foreach ($_SESSION['pdf'] as $key => $value) {
		//sprint_r($key);
		if($value['product_id'] == $_POST['pdf_num']){
			//echo "hello";
			unset($_SESSION['pdf'][$key]);
			//$_SESSION['cart'] = array_values($_SESSION['cart']);
			echo'<script>alert("Item removed")</script>';
			echo '<script>window.location="pdfcheck.php"</script>';
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
        <div class="table-responsive" style="background-color:brown;">
            <table class="table table-bordered" style="margin-left:18%;">
            <tr>
                <th width="30%">Product Name</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["pdf"])){
                    $total = 0;
                    foreach ($_SESSION["pdf"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["product_price"], 2); ?></td>
                            <td>
                            	<form method="POST" action="pdfcheck.php">
                            		<button name="remove">Remove</button>
                            		<input type="hidden" name="pdf_num" value="<?php echo $value["product_id"];?>">
                            	</form>
                            </td>

                        </tr>
                        <?php
                        	$total = $total + ($value["product_price"]);
                    	} 
                    	?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>                                   
                        	<td></td><!--number format function is inbuilt function that display number in format of number with .00(two decimal)-->
                        </tr>
                        <tr>
                        	<td colspan="4" align="center">

                        		<form method="POST" action="payOption.php">
                                    <input type="hidden" name="pid" value="<?php echo $value["product_id"]  ?>">
                            
                                    <!--<input type="hidden" name="hname" value="<?php echo $value["item_name"]; ?>">
                                    <input type="hidden" name="hpprice" value="<?php echo $value["product_price"]; ?>">
                                    <input type="hidden" name="iquantity" value="<?php echo $value["item_quantity"]; ?>">-->

                                    <input type="hidden" name="itotal" value="<?php echo number_format($total, 2);  ?>">       
                         			<input type="submit" name="submittone" style="margin-top: 5px;" class="btn btn-success"
                                    value="Check Out">
                                       
  									<!--<input class="form-check-input" type="radio" name="choice"  id="cash" value="option1" >
 									<label class="form-check-label" for="cash">Cash On Delivery</label><br>
								
							
 							 		<input class="form-check-input" type="radio" name="choice"   id="online" value="option2">
  									<label class="form-check-label"  for="online">Online Payment</label>-->
                                    <?php echo $value["product_price"];?>

  								</form>

                        	</td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>