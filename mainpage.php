<?php
include('Discovering-Nepal/database.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="index1.css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e5823df915.js" crossorigin="anonymous"></script>
    
    <title>Discovering Nepal</title>
    <style>
        body{
          overflow-x: hidden;
            color: white;
            background-color:black;
        }
        .navbar{
            background:rgba(0, 0, 0, 0.6);
        }
        .navbar-brand{
            height: 2rem;
        }

      .video-background{
            position:relative;
            width: 100%;
            min-height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
        }
       .caption{
        position:absolute;
            top: 38%;
            width: 100%;
            color:rgb(255, 254, 254);
            

        }
        .caption h1{
           
            font-weight:700;
            letter-spacing: .2rem;
            text-shadow: .1rem .1rem .8rem black;
        }
        .caption h3{
           
            font-weight:700;
            letter-spacing: .2rem;
            text-shadow: .1rem .1rem .5rem black;
        }
        .links li{
          
        }
  


    </style>
</head>
    <body>
        <!--navbar-->
    <nav class="navbar navbar-dark fixed-top">
                 <a class="navbar-brand mx-auto" href="#Home"><h3>D-N </h3></a>
    
    </nav>
    
 <!--ending of nav bar-->
 <!--video playout without music-->

<div class="video-background">
     <div class="video--wrap">
         <div id="video">
             <video class="ratio ratio-16×9" id="vid" autoplay loop muted>
                 <source src="Nepal_ Nepal.mp4" type="video/mp4">
             </video>
            </div>
            <div class="caption text-center d-block ">
              <h2 class="text-dark">Welcome to our site Discovering nepal</h2>
              <h3 class="text-dark">Lets us discover Nepal </h3>
              
              
              <div class="d-inline "><a href="Discovering-Nepal/admin/login.php" class="text-white btn btn-primary   ">Log In</a></div>
              <div class="d-inline "> <a href="Discovering-Nepal/signupdemo.php" class="text-white btn btn-danger btn-md  ">SignUp</a></div>
            
                      
           
              <!--<a class="btn btn-outline-light btn-lg" href="#footer">Get Started</a>-->
          </div>
      </div>
          
</div>
  
<!--video playout end here-->



  
    
  <!--footer section start-->

  <footer class="bg-dark text-center text-white" id="footer">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- section:message -->
   
      <!-- section:message -->
      <section class="mb-4">
        <p>
         Hey wellcome to the footer section !!!
         Hope you enjoy the jorney and we hope you will enjoy the futher jorney..
        </p>
      </section>
  
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
     
      <!-- Section: Text -->
  
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
            <h5 class="text-uppercase">Contact us</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
                <i class="fas fa-home"></i>
                <a href="#!" class="text-white"> Kathmandu</a>
              </li>
              <li>
                <i class="fas fa-phone"></i>
                <a href="#!" class="text-white ">9811099199</a>
              </li>
              <li>
                <i class="far fa-envelope"></i>
                <a href="#!" class="text-white">teamvoltrontrio@gmail.com</a>
              </li>
             
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
           
              
              
              
              
            </ul>
          </div>
          <!--Grid column-->
  
         
  
          
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Discovering-Nepal.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <!-- Footer -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  
  </body>
</html>
  