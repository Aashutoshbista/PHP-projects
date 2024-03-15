<?php 
session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Notra</title>
	<style type="text/css">
	table, td, th {
  		border: 1px solid black;
  		text-align:center;
	}

	table {
  		width:80%;
  		border-collapse: collapse;
}
	</style>
</head>
<body>
	<h3 class="title2">Shopping Cart Details</h3>
	<div style="height:600px;">
	<div style="height:100%;background-color:purple;float:left;width:50%;">
		<?php
            /*$query1 = "SELECT * FROM buy ORDER BY buy_id ASC ";
            $result = mysqli_query($conn,$query1);
            $num =mysqli_num_rows($result);
            echo $num;
            if($num>0){

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3" style="height:500px; background-color:yellow;">
                    	<table>
                    		<tr>
                    			<th width="15%">Customer Name</th>
                				<th width="10%">Email</th>
                				<th width="13%">Phone</th>
                				<th width="10%">Address</th>
                			</tr>
                			<tr>
                				<td><?php echo $row["name"]; ?></td>
                				<td><?php echo  $row["email"];?></td>
                				<td><?php echo $row["phone"]; ?></td>
                				<td><?php echo  $row["address"];?></td>
                			</tr>
                    	</table>
                       
                    </div>
                    <?php
                }
            }*/
            echo "hello";
            if (isset($_POST['cashOn'])){
                $one = $_POST['name'];
                $two = $_POST['address'];
                $three = $_POST['num'];
                $four = $_POST['email'];
                $five = $_POST['province'];
                $six = $_POST['zip'];
                echo "$one";
                echo "$six";



                //$query= "INSERT INTO '`delivery_info`(d_id,name,email,phnum,email,province,zip,status) VALUES('NULL','$one','$two','$three','$four','$five','$six','no')";
                $query2="INSERT INTO `delivery_info` (`d_id`, `name`, `address`, `phnum`, `email`, `province`, `zip`, `status`) VALUES (NULL,'$one','$two','$three','$four','$five','$six','no')";
                if(mysqli_query($conn,$query2)){
                  echo "ACCOUNT CREATED SUCESSFULLY";
                }else{
                  echo "FAIL TO CREATE ACCOUNT";
            }
        }
        ?>
	</div>
</div>
</body>
</html>
    

        <!--<div class="table-responsive" style="background-color:pink;float:left;height:100%;width:50%;">
            <table class="table table-bordered" style="margin-left:18%;">
            <tr>
                <th width="15%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="15%">Total Price</th>
            </tr>

            <?php

                /*if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>                                   
                        <!--number format function is inbuilt function that display number in format of number with .00(two decimal)-->
                        </tr>
               
                        <?php
                    }
      
           	?>*/
            #</table>
        #</div>
#</div>
#</body>
#</html>