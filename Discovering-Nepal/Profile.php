<?php
include('authentication.php');
include('database.php');
include('header.php');




?>
<main>
<?php
$user_id=$_SESSION['auth_user']['user_id'];
  $query="SELECT * FROM users WHERE id=$user_id";
  $query_run= mysqli_query($conn,$query);
  if(mysqli_num_rows($query_run) > 0)
  {
              foreach($query_run as $row)
              {



?>

<div class="container pt-3">
    <div class="main-body">
          <div class="row gutters-sm ">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $row['name'];  ?></h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm"></p>
                    
                    </div>
                  </div>
                </div>
              </div>
</div>
              
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['name'];  ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email'];  ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['phone'];  ?>
                    </div>
                  </div>
                  <hr>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['age'];  ?>
                    </div>
                  </div>
                  <hr>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['u_addr'];  ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="EditProfile.php">Edit</a>
                    </div>
                  </div>
                </div>
              </div>

              


            </div>
          </div>

        </div>
    </div><?php 
     }}
    ?>
             
    </main>