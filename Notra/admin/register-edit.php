<?php
include("authentication.php");
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
include("config/dbcon.php");

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                    
           
                        <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Registered user</h3>
                                  
                                    <a href="register.php"  class="btn btn-danger btn-sm float-right">Back</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                        <form action="code.php" method="POST">
                <div class="modal-body">
                    <?php
                        if(isset($_GET['user_id'])){
                            $user_id = $_GET['user_id'];
                            $query="SELECT * FROM users WHERE id=$user_id";
                            $query_run=mysqli_query($conn,$query);
                            if(mysqli_num_rows($query_run)>0){


                                foreach($query_run as $row){
                                    ?>
                                            <div class="form-group">
                                                    <input type="hidden" name="user_id" value="<?php echo $row['id']?>"></br>


                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name">

                                            </div>
                                            <div class="form-group">
                                            <label for="">Email</label>
                                                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email">

                                            </div>
                                            <div class="form-group">
                                            <label for="">Phone Number</label>
                                                <input type="text" name="phonenumber" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Phone Number">

                                            </div>
                                            <div class="form-group">
                                            <label for="">Password</label>
                                                <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Password">

                                            </div>

                                            <div class="form-group">
                                            <label for="">Give Role</label>
                                                <select name="role_as" class="form-control" id="" required>
                                                <option value="">Select</option>    
                                                <option value="0">User</option>
                                                    <option value="1">Admin</option>
                                                </select>

                                            </div>
                                       
                                        <div class="modal-footer">
                                            
                                            <button type="submit" name="updateuser" class="btn btn-primary">Update </button>
                                        </div>
                                </div>
                                                            
                                    
                                    
                                    <?php


                                }
                            }
                            else{
                                echo"<h4>No record found<h4>";
                            }

                        }
                       
                    
                    ?>
                    
      
            </form>




                                        </div>


                                </div>
                    </div>
            </div>
        </div>
    </div>






</div>


<?php

include("include/script.php");
include("include/footer.php");

?>
