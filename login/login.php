<?php 
include "../Headerfooter/header.php";
session_start();
if(isset($_SESSION['authenticated']))
{
    $_SESSION['status']="You are already loged in";
    header("location:../components/index.php");
    exit(0);
}
?>


<!-- Pills content -->
<div class="container container-login">
 
<div class="alertmessage">
      <?php
        if(isset($_SESSION['status']))
        {?>
        <div class="alert alert-sucess">
        <?php
          echo "<h4>".$_SESSION['status']."<h4>";
          ?>
          </div><?php
          unset($_SESSION['status']);
        }
      ?>
    </div>
    <p class="headingoflogin">Sign In</p>
      <form action="../code.php" method="POST">
      
      <!-- Email input -->

      <div class="form-outline mb-4">
        <input type="email" id="loginName" required="true"  name="email"class="form-control" />
        <label class="form-label" for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="loginPassword" required="true" name="password"class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">

        </div>

        <div class="col-md-6 d-flex justify-content-center">
        
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="register.php">Register</a></p>
      </div>
    </form>
 



<?php 
include "../Headerfooter/footer.php"
?>