<?php
include("authentication.php");
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
include("config/dbcon.php");

?>



<div class="content-wrapper">


    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                    
           
                        <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Catagorie Detail</h3>
                                  
                                    <a href="category.php"  class="btn btn-danger btn-sm float-right">Back</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">

            <form action="code.php" method="POST">
                <div class="modal-body">
                    <?php
                        if(isset($_GET['cat_id'])){
                            $cat_id = $_GET['cat_id'];
                            $query="SELECT * FROM catagories WHERE cat_id=$cat_id";
                            $query_run=mysqli_query($conn,$query);
                            if(mysqli_num_rows($query_run)>0){


                                foreach($query_run as $row){
                                    ?>
                                            <div class="form-group">
                                                    <input type="hidden" name="cat_id" value="<?php echo $row['cat_id']?>"></br>


                                                <label for="">Categori Name</label>
                                                <input type="text" name="name" value="<?php echo $row['cat_name'] ?>" class="form-control" placeholder="Name">

                                            </div>
                                           
                                            

                                            
                                        <div class="modal-footer">
                                            
                                            <button type="submit" name="updatecatagories" class="btn btn-primary">Update </button>
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
