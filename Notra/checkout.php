<!DOCTYPE html>
<<!DOCTYPE html>
<html>


<?php session_start();?>


<div style="height: 150px;"></div>
<div style="width: 80%; margin: 0 auto;">
		<div style="width: 50%; margin: 0 auto;">
		
<?php include  "connection.php"; ?>

	
    <form action="ordersample.php" method="post">

		<table align="center" border="1" cellspacing="14" cellpadding="12" style="width: 100%">
          <tr>
			<th> <h3 align="center" style="font-size: 1.3em;">Fill Up Details To Deliver Your Item</h3> </th>
		<br>
            </tr>
			    <tr align="center">

			    	<td style="color: red">  Enter your name  <br>
			        <input type="text" name="nm" placeholder="Enter your name" style="width: 100%; padding: 10px; color: white; background-color: black" required="" pattern="[a-z,A-Z]*"></td>
			    		
			    </tr>

			    <tr align="center">
			    	<td style="color: red">   Enter Mobile no <br>
			        <input type="no" name="mo" placeholder="Enter Mobile no" style="width: 100%; padding: 10px; color: white; background-color: black" required="" pattern="\d{10}"></td>
			    </tr>

			    <tr align="center">
			    	<td style="color: red">   Enter Email address <br>
			        <input type="Email" name="em" placeholder="Enter email address" style="width: 100%; padding: 10px; color: white; background-color: black"></td>
			    </tr>

                <tr align="center">
                	<td style="color: red"> Enter address <br>
                 <input type="text" name="ad" placeholder="enter your address" style="width: 100%; padding: 50px; color: white; background-color: black">
                </tr>	

                <tr align="center">
                	<td colspan="4" > <input type="submit" name="s" value="Confirm Order" style="height: 50px; background-color:lightgreen; color: black; padding: 10px; width: 30%;"> </td>

                	  
                	
                	
                </tr>

                		    </table>	
			</form>
		           
<body>

    <form action="https://uat.esewa.com.np/epay/main" method="POST" target = "_blank">
    <!--<input value="1000" name="tAmt" type="hidden">
    <input value="100" name="amt" type="hidden">
    <input value="5" name="txAmt" type="hidden">
    <input value="2" name="psc" type="hidden">
    <input value="3" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
   <input value="RASP01" name="pid" type="hidden">-->
  
    <input value="http://brp.com.np/esewa/success.php??q=su" type="hidden" name="su">
    <input value="http://brp.com.np/esewa/failed?q=fu" type="hidden" name="fu">
    <input value="Add PAYMENT" type="submit" class="btn btn-success">

    </form>

</body>


	</div>
</div>




</html>