<?php 
include "../Headerfooter/header.php";
session_start();
?>


<!-- Pills content -->
<div class="container container-login">
 
    <div class="alert">
      <?php
        if(isset($_SESSION['status']))
        {
          echo "<h4>".$_SESSION['status']."<h4>";
          unset($_SESSION['status']);
        }
      ?>
    </div>
    <p class="headingoflogin">Sign Up</p>
    <form action="../code.php" method="post">
     <!-- Name input -->
     <div class="form-outline mb-4">
        <input type="text" id="registerName" name="name" class="form-control" />
        <label class="form-label"  for="registerName">Name</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="loginName" name="eid" class="form-control" />
        <label class="form-label"  for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="loginPassword" name="pass" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
     <!--  <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>
 -->
      <!-- Checkbox -->
      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">

        </div>

        <div class="col-md-6 d-flex justify-content-center">
        
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4" name="register">Sign Up</button>

      <!-- Register buttons -->
      </form>
      <div class="text-center">
        <p>Already a member? <a href="login.php">Sign in</a></p>
      </div>
    </form>
  </div>
 



<?php 
include "../Headerfooter/footer.php"
?>