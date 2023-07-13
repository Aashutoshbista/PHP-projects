<?php

include('database.php');?>
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
    <style>



    </style>
    
    <title>Discovering-Nepal</title>
    <style>
      body{
        overflow-x: hidden;
      
      }
      .navbar {
  		
 		background-image: url('Backg.png');
 		
  		
  		background-repeat:repeat;
  	
  		background-size:30%,auto;
  		
  	
      height:60PX; /* Adjust the height as needed */
      width:100%; /* Adjust the width as needed */
      /* Additional styling for the navbar brand */
  }
 
     
    </style>
    
 <body>
       <!--navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark text-dark   bg-dark text-center text-dark ">
            
        <div class="container-fluid">
          <a class="navbar-brand text-dark " href="index.php">D-N</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" href="index.php">Home</a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Places
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                  /*Edit here the Popular places*/
                    $sql="SELECT * FROM catagories";
                    $sql_run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($sql_run)>0){
                      foreach($sql_run as $row)
                      {
                      ?>
                      <li><a class="dropdown-item" href="catagories.php?cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name'];?></a></li>
                   
                      <?php
                      }
                    }
                  ?>
                  

                  
                </ul>
                <li class="nav-item">
                    <a class="nav-link" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" href="Contactus.php">Contact Us</a>
                  </li>
              </li>
             
             
            </ul>
                   
            <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
                <div class="dropdown">
           <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  
                <img src="profile.png"  alt="profile" style="height:30px;">
               
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form action="code.php"method="POST">
                <div class="btn btn-secondary ">
            <a class="dropdown-item " href="Profile.php?users_id=<?php  echo $_SESSION['auth_user']['user_id'] ;  ?>">
            <?php
               if(isset($_SESSION['auth'])){
              echo $_SESSION['auth_user']['user_name'] ;
              }
              else{
                echo "Not logged IN";
              }
               
               ?>
               </a>
               </div>
              
              <a class="dropdown-item" name="ChangePassword" href="AddPlaces.php">Add Place</a>
              
              
              <a class="dropdown-item" name="ChangePassword" href="ChangePassword.php?users_id=<?php  echo $_SESSION['auth_user']['user_id'] ;  ?>">Change password</a>
             
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                    

              </form>
                  </div>
          </li>
</ul>




            <form action="index.php" class="d-flex" method="POST">
              <input class="form-control me-2" type="text" name="searchinput" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" name="submitsearch"type="submit">Search</button>
            </form>
           
            
          </div>
         
        </div>
     <!--   <ul class="navbar-nav ml-auto">
       <li class="nav-item">
       <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
            <?php/* 
               if(isset($_SESSION['auth'])){
              echo $_SESSION['auth_user']['user_name'] ;
              }
              else{
                echo "Not logged IN";
              }
               
              */ ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form action="code.php"method="POST">
              <a class="dropdown-item" name="ChangePassword" href="change-password.php?users_id=<?php  echo $_SESSION['auth_user']['user_id'] ;  ?>">Change password</a>
              <a class="dropdown-item" href="#">Something else here</a>
             
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                    

              </form>
            
            </div>
          </div>

       </li> 

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    -->
   

      </nav>

<!--ending of nav bar-->
