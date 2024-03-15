
  
  <?php

function setcomments($conn) {
    if(isset($_POST['commentSubmit'])){
        //INsert the data to the database
        $Name=$_POST['name'];
        $content=$_POST['msg'];
        $Date=$_POST['date'];
        $Uid=$_POST['email'];
        $book_id=$_POST['book_id'];

        $sql="INSERT INTO comments(Uid, submit_date, content, name,bid) 
        VALUES('$Uid',' $Date','$content','$Name','$book_id')";
        $result = $conn->query($sql);

        }


}

function getComments($conn){
   
    $sql="SELECT * FROM comments  WHERE bid=$books_id";
    $result = $conn->query($sql);
    
    while($row=$result->fetch_assoc()){
       echo" <div class='comment-box text-justify white mt-4 float-right'><p>";
    echo"<img src='https://i.imgur.com/CFpa3nK.jpg' alt='' class='rounded-circle' width='40' height='40'>";
    echo $row['name'];echo"-";
     echo $row['submit_date']."<br><br>";

    
    echo $row['Uid']."<br><br>";
    
    echo nl2br($row['content']);
echo"</p></div>";

        }
}
?>
 

 <a href="cart.php?books_id=<?php echo $row['books_id'];  ?>" class="btn btn-primary"><i class="fas fa-info-circle pr-2"  ></i>Add to Cart</a>




 if(isset($_POST['updateproduct']))
{
    $name=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_auther=$_POST['product_auther'];
    $product_description=$_POST['product_desc'];
    $product_price=$_POST['product_price'];
    $product_qty=$_POST['product_qty'];
    $product_img=$_FILES['product_img']['name'];


    $query_up="UPDATE  books SET books_name='$name',product_cat='$product_cat',books_auther='$product_auther',books_discription='$product_description',books_price='$product_price',book_quantity='$product_quantity',book_cat="$product_cat"  WHERE id='$user_id'";


    
    $query_up_run = mysqli_query($conn,$query);
    if($query_up_run){

            $_SESSION['status']="User updated sucessfully";
            header("Location:userproduct.php");
            }
            else
            {
            $_SESSION['status']="User updated fail";
            header("Location:userproduct.php");
            }

}



<!--slider-->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner pt-2 pb-2 pb-sm-1">
    <div class="carousel-item active">
     <a href="Bestsellingbooks.html"> <img src="productslider2.jpg" class="d-block w-100" alt="..."></a>>
    </div>
    <div class="carousel-item">
     <a href="Bestsellingbooks.html"> <img src="productslider3.jpg" class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
      <a href="Bestsellingbooks.html"><img src="ps4.webp" class="d-block w-100" alt="..."></a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        


<!--end slider-->
<li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>






              ///


              <div class="nav">
        <button style="float:left;width:60px;height:20px;margin:0px;background-color:red;"><a href="bill.php">Cart(<?php echo "$count" ?>)</a></button>
    </div>
    <div class="contain" style="width:100%;height:700px;background-color:white;">
    
        <?php
            $query = "SELECT * FROM items ORDER BY item_id ASC ";
            $result = mysqli_query($conn,$query);
            $num = mysqli_num_rows($result);
            if($num>0){

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3" style="height:500px; ">

                        <form method="post" action="cartSample.php">

                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" >
                                <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                                <h5 class="text-danger">Rs<?php echo  $row["price"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["item_id"]; ?></h5>
                     
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                   <input type="hidden" name="i_id" value="<?php echo $row["item_id"]; ?>">
                        
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
      </div>



      <td>
                                                                                            <img src="<?php echo"images/". $row['books_pic']; ?>" alt="img" width="70px">
                                                                                        </td>








                                                                                        

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