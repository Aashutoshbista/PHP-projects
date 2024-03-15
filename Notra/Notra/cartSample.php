<?php
    include('database.php');
    session_start();

  
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
                echo '<script>window.location="cartSample.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cartSample.php"</script>';
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
                    echo '<script>window.location="cartSample.php"</script>';
                }
            }
        }
    }*/
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin-top:20px;
            padding:5px;
            text-align: center;
            background-color:pink;
            height:80%;
        }
        .product img{
            height:50%;
            width:100%;

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
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
.why-us h2 {
    position: relative;
    margin-bottom: 35px;
}
.why-us h2::after {
    content: "";
    width: 120px;
    height: 3px;
    display: inline-block;
    background: #FFC107;
    position: absolute;
    left: 0px;
    right: 0px;
    bottom: -20px;
    margin: 0 auto;
}

.why-us .box {
    padding: 50px 30px;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.10);
    transition: 0.5s;
    position: relative;
    background-color: #333;
    max-height: 230px;
    overflow: hidden;
    margin-bottom: 30px;
    border-radius: 10px;
}
.why-us .box:hover {
    padding: 30px 30px 70px 30px;
    box-shadow: 10px 15px 30px rgba(0, 0, 0, 0.20);
    background-color: rgba(0, 0, 0, 0.3);
}
.why-us .box img {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    z-index: -1;
    opacity: 0;
    transition:all ease 1s; 
}
.why-us .box:hover img {
    opacity: 1;
}
.why-us .box span {
    display: block;
    font-size: 56px;
    font-weight: 700;
    color: #6b6060;
    position: absolute;
    right: 10px;
    top: 0px;
    line-height: normal;
}
.why-us .box h4 a {
    font-size: 24px;
    font-weight: 600;
    padding: 0;
    margin: 20px 0;
    color: #dadada;
    text-decoration: none;
}
.why-us .box p {
    color: #aaaaaa;
    font-size: 15px;
    margin: 0;
    padding: 0;
}
.why-us .box:hover span,
.why-us .box:hover h4 a,
.why-us .box:hover p {
color: #fff;
}
    </style>
  
</head>
<body>
<div class="m-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Notra</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a href="History.php" class="dropdown-item">History</a>
                            <a href="Scifi.php" class="dropdown-item">Sci-fi</a>
                            <a href="Poetry.php" class="dropdown-item">Poetry</a>
                        </div>
                    </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">Reports</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
</div>





























    <div class="nav">
        <button style="float:left;width:60px;height:20px;margin:0px;background-color:red;"><a href="bill.php">Cart(<?php echo $count?>)</a></button>
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


<!--footer section-->
<!-- Footer -->




<footer class="bg-dark text-center text-white" id="footer">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
  
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
       
  
       
      </section>
      <!-- Section: Social media -->
  
      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" />
                <label class="form-label" for="form5Example2">Email address</label>
              </div>
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->
  
      <!-- Section: Text -->
      <section class="mb-4">
        <p>
         Hey wellcome to the footer section !!!
         Hope you enjoy the jorney and we hope you will enjoy the futher jorney..
        </p>
      </section>
      <!-- Section: Text -->
  
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
         <div class="row">
                <!--Grid column-->
                        <div class="col-lg-6 col-md-6 mb-3 mb-md-0">
                            <h5 class="text-uppercase">Contact Us</h5>
                
                            <ul class="list-unstyled mb-0">
                            <li>
                                <i class="fas fa-home"></i>
                                <a href="#!" class="text-white"> Kathmandu</a>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="#!" class="text-white">9811099199</a>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <a href="#!" class="text-white">Notra@gmail.com</a>
                            </li>
                            
                            </ul>
                        </div>
                        <!--Grid column-->
                
                        <!--Grid column-->
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Hot Links</h5>
                
                            <ul class="list-unstyled mb-0">
                            <li>
                                <a href="aboutus" class="text-white">About Us</a>
                            </li>
                            
                            
                            
                            </ul>
                        </div>
                 <!--Grid column-->
           </div>
      </section>
      <!-- Section: Links -->
      
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Notra.com</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>
</html>