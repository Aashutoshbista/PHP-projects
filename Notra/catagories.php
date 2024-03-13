<?php
include('authentication.php');
include('database.php');
include('header.php');




?>


<main>
    <div class="container-fluid p-0">
        <div class="row">
            <h2 ><?php echo $_GET['cat_name'];?></h2>
        <div class="col-md-12">
                                <!--Section: Block Content-->
            <section class="text-center">

                <!-- Grid row -->
                <div class="row m-1 w-100 ">
                <?php
                if(isset($_GET['cat_name'])){
                   
                    $cat_name=$_GET['cat_name'];
                    $query="SELECT * FROM items WHERE item_cat='$cat_name'";
                    $query_run=mysqli_query($conn,$query);
                    if( mysqli_num_rows($query_run)>0){
                        while($row=mysqli_fetch_assoc($query_run)){   
                    ?> 
                    
                    <!-- Grid column -->
                    <div class="  col-sm-6 col-md-4 col-lg-3 mb-3 shadow p-3 bg-light rounded ">
                                            <!-- Card -->
                        <div  class=" col-sm-12 col-md-12 col-lg-12 mb-3 shadow p-3 bg-light rounded" >
                            <div>
                            <div class=' z-depth-2 rounded'>
                                <div class="mask">
                               
                                        <img class="img-fluid w-100 image-size" src="<?php echo"admin/images/". $row['image']; ?>" alt="img" width="100" >
                                        <div class="mask rgba-black-slight"></div>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                            <h5><?php echo $row['name'];?></h5>
                                <p class="mb-2 text-muted text-uppercase small"><?php echo $row['item_cat'];?></p>
                                <h6 class="mb-3"> $<?php echo $row['price'];?></h6>


                               
                                
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
                    else{
                        ?><h1>No record found</h1><?php   
                    }  
                    
                    }
                  
?>
</div> 
            </section>
                <!--Section: Block Content-->
        </div>
    </div>







</main>

<!--footer section-->
<?php
include('footer.php');
?>