<?php
include('database.php');
include('header.php');

?>
<!-- DeleteUser-->
<div class="modal fade" id="Deletemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="code.php" method="POST">
                          <div class="modal-body">
                                  <input type="hidden"name="deletepro_id" class="delete_pro_id">
                                                      <p>Are you sure you want to delete</p>

                          </div>
                          <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="Deleteproduct" class="btn btn-primary">yes </button>
                          </div>
            
                        </form>
                </div>
              </div>
          </div>
<!--Delete user-->

<div class="content-wrapper pt-2">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <?php           
                                    if(isset($_SESSION['status'])){
                                            echo"<h4>".$_SESSION['status']."</h4>";
                                            unset($_SESSION['status']);
                                    }
                              ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                       Cart
                                        
                                    </h4>
                                </div>
                                <div class="contain" id="div1" style="width:100%;background-color:grey;overflow:hidden; display:block;" >
    <?php
      $selectQuery = "select * from pdf LIMIT 4";
      $squery = mysqli_query($conn, $selectQuery);
      while ($result = $squery->fetch_object()) {
        $name = $result->filename;
        $path = $result->directory;
        $file = $path.$pdf;
        $price = $result->price;
        $pdf_id = $result->pdf_id;
        $desc = $result->description;
       //$pdf = $result['filename'];
      //echo "$file";
      //echo "$pdf";
      //echo "<br>";
      //echo "$price";
      ?>
      <div class="productone">
          <form method="post" action="pdftest.php">
            <div class="product1">
              <img src="image/pdf.png" >
                  <h5 class="text-info"><?php echo "$pdf";?></h5>
                  <h5 class="text-danger">Price:Rs<?php echo "$price";?></h5>
                  <!--<p><span id="less">..</span>
                  <span id=" more"><?php //echo "$desc"; ?></span></p>
                  <button onclick="myFunction()" id="myBtn">Description</button>-->
                  <h5 class="text-danger">Description:<br><?php echo "$desc"; ?></h5>
                              
                  <!--<h5><a href="pdfdownload.php?file=<?php echo($pdf)?>">Download Now</a></h5>-->
               
             
                  <input type="hidden" name="pdf_name" value="<?php echo "$pdf"; ?>">
                  <input type="hidden" name="pdf_price" value="<?php echo "$price" ?>">
                  <input type="hidden" name="pdf_id" value="<?php echo "$pdf_id" ?>">
                        
                  <input type="submit" name="addpdf" style="margin-top: 5px;" class="btn btn-success"
                  value="Add to cart">
            </div>
          </form>
      </div>
       <?php
      }
    ?>
    <button onclick="next()" style="float:right;"> Next</button>
   
  </div>































                                <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Auther</th>
                                                    <th>Price</th>
                
                                                    <th>Image</th>
                                                    
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php   
                                                        
                                                            $book_id = $_GET['books_id'];

                                                            $user_id=$_SESSION['auth_user']['user_id'];
                                                            $query="SELECT * FROM books WHERE books_id=$book_id";
                                                            $query_run= mysqli_query($conn,$query);
                                                            if(mysqli_num_rows($query_run) > 0)
                                                            {
                                                                        foreach($query_run as $row)
                                                                        {
                                                                            //echo $roe['name'];
                                                                            ?>
                                                                                 <tr>
                                                                                        <td><?php echo $row['books_name'];  ?></td>         
                                                                                        <td><?php echo $row['book_cat'];  ?></td>
                                                                                        <td><?php echo $row['books_auther'];  ?></td>
                                                                                        <td><?php echo $row['books_price']; ?></td>
                                                                                        
                                                                                        <td>
                                                                                            <img src="<?php echo"admin/images/". $row['books_pic']; ?>" alt="img" width="70px">
                                                                                        </td>
                                                                                       
                                                                                        <td>
                                                                                            <a type="hidden" href="usereditproduct.php?books_id=<?php echo $row['books_id'];  ?>" class="btn btn-info">Edit</a>
                                                                                            <button type="button" value="<?php echo $row['books_id'];?>" class="btn btn-danger deletebtn">Delete</button>
                                                                                        </td>
                                                                                        
                                                                                    </tr>



                                                                            <?php
                                                                        }
                                                            }
                                                            else{
                                                                ?>
                                                                <tr>
                                                                    <td>No record found</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        
                                                        
                                                        
                                                        ?>
                                                    </tbody>
                                            </table>
                                    </div>
                    </div>
            </div>
        </div>
    </div>
  

                                   
                                                        </div>



    <!-- /.content -->


<?php 
include('footer.php');
?>