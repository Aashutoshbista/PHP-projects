<?php
include('authentication.php');
include('database.php');
include('header.php');




$count = count($_SESSION["cart"]);
if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        if (!in_array($_POST["i_id"],$item_array_id)){//if iteam id is not in the array of item_array_id(session) *** in array means to search in something within array
            $count = count($_SESSION["cart"]);//count the number of item in session cart
            $item_array = array(
                'product_id' => $_POST["i_id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="index.php"</script>';
        }else{
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    }else{
        $item_array = array(
            'product_id' => $_POST["i_id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;//initialize the session array
    }
}

/*if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["product_id"] == $_GET["product_id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}*/
?>






<main>
    <div class="container-fluid p-0">
    <div class="nav pt-1">
        <a href="bill.php"><button class="btn btn-danger">Cart(<?php echo $count?>)</button></a>
    </div>
        <div class="row">
        <div class="col-md-12">
          <?php
          include("admin/message.php");
          ?>
        </div>
                        <!--Section: Block Content-->
            <section class="text-center">
              <!--slider-->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner pt-2 pb-2 pb-sm-1">
    <div class="carousel-item active">
     <a href="#"> <img src="productslider2.jpg" class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
     <a href="#"> <img src="productslider3.jpg" class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
      <a href="#"><img src="ps4.webp" class="d-block w-100" alt="..."></a>
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

                <!-- Grid row -->
                <div class="row m-1 w-100 ">
                          <?php
                      $query = "SELECT * FROM items ORDER BY item_id ASC ";
                      $result = mysqli_query($conn,$query);
                      $num = mysqli_num_rows($result);
                      if($num>0){

                while ($row = mysqli_fetch_array($result)) {

                    ?>

                    <!-- Grid column -->
                    <div class="  col-sm-6 col-md-4 col-lg-3 mb-3 shadow p-3 bg-light rounded ">
                                            <!-- Card -->
                        <div  class=" col-sm-12 col-md-12 col-lg-12 mb-3 shadow p-3 bg-light rounded" >
                            <div>
                            <div class=' z-depth-2 rounded'>
                            <form method="POST" action="index.php">
                                <div class="mask">
                                
                                
                                        <img class="img-fluid w-100 image-size" src="<?php echo"admin/images/". $row['image']; ?>"  alt="img" width="100" >
                                        <div class="mask rgba-black-slight"></div>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <h5><?php echo $row["name"]; ?></h5>
                            <input type="text" name="quantity" class="form-control" value="1">

                           <input type="hidden" name="hidden_cat" value="<?php echo $row["item_cat"]; ?>">
                                <p class="mb-2 text-muted text-uppercase small"><?php echo $row['item_cat'];?></p>

                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <h6 class="mb-3"> $<?php echo  $row["price"]; ?></h6>

                                <input type="hidden" name="i_id" value="<?php echo $row["item_id"]; ?>">


                               
                                  <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary"
                                       value=" Add to Cart">
                                  </form>
                                
                                <form action="code.php"  method="POST">
                               
                              
                                                                
                                <a href="productdetail.php?books_id=<?php echo $row['item_id'];  ?>" class="btn btn-danger"><i class="fas fa-info-circle pr-2"  ></i>Detail</a>
                                </form>
                                

                            </div>

                    </div>
                 </div>
                                            <!-- Card -->
                </div><!--row div-->
                <!-- Grid row -->
                   
                 <?php
        }
}
?>
</div> 
            </section>
                <!--Section: Block Content-->
        </div>
    </div>







    <!--It ends here-->
    <!-- Why Us Section -->
<section class="why-us">
    <div class="container">
          <div class="row">
        <div class="col-md-8 offset-md-2">
          <h2 class="mt-5 text-center">Why Choose Us</h2>
          
        </div>
      </div>
  
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <span>01</span>
            <h4><a href="#">100% ORIGINAL</a></h4>
            <p>All the books sold by Notra are garaunteed to be original books provided by the publisher and customer saisfaction is our moto.</p>
            <img src="/images/image-one.jpg" alt="">
          </div>
        </div>
  
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <span>02</span>
            <h4><a href="#">Free Delevery</a></h4>
            <p>Free delivery for order above Rs. 1000 inside kathmandu valley and Rs. 100 delivery charge for other city</p>
            <img src="/images/image-two.jpg" alt="">
          </div>
        </div>
  
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <span>03</span>
            <h4><a href="#">Reward Point</a></h4>
            <p>Get Reward Points on every order, product review and referral. click here to know more about reward points</p>
            <img src="/images/image-three.jpg" alt="">
          </div>
        </div>
  
      </div>
    </div>
  </section>
  <!-- End Why Us Section -->
</main>

<!--footer section-->
<?php
include('footer.php');
?>