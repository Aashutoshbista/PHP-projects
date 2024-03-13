<?php
include('authentication.php');
include('database.php');
include('header.php');

?>
<div class="card">
                                <div class="card-header">
                                    <h4>
                                        Books category
                                        <a href="index.php" data-toggle="modal" data-target="#category_modal" class="btn btn-danger btn-sm">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">

                                            <div class="admin-content-container">
                                                    <h2 class="admin-heading">Add New Product</h2>
                                                    <form id="createProduct" action="code.php" class="add-post-form row" method="POST" enctype="multipart/form-data">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label for="">Product Title</label>
                                                                <input type="text" class="form-control product_title" name="product_title" placeholder="Product Title" requried/>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group category">
                                                                <label for="">Product Category</label>
                                                                <?php
                                                                      $query="SELECT * FROM catagories";
                                                                      $query_run= mysqli_query($conn,$query);
                                                                     
                                                                      ?>
                                                                       
                                                                      <select name="category" class="form-control product_category" >
                                                                      <option value="" selected disabled>Select Category</option>
                                                                      <?php
                                                                      if(mysqli_num_rows($query_run) > 0)
                                                                      {
                                                                                  foreach($query_run as $category)
                                                                                  {
                                                                                    ?>
                                                                                    <option  name="specific_cat" value="<?php echo $category[ 'cat_name'];?>">
                                                                                    <?php echo $category['cat_name']; ?></option>
                    
                                                                                      <?php
                                                                                  }
                                                                      }
                                                                      else{
                                                                        echo "No Catagory found";
                                                                      }
                                                                  ?>
                                                                   </select>

                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="">Product Description</label>
                                                                <textarea class="form-control product_description" name="product_desc" rows="8" cols="80" requried></textarea>
                                                            </div>
                                                            <div class="show-error"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Featured Image</label>
                                                                <input type="file" accept=".png ,.jpg,.jpng" class="product_image" name="product_img">
                                                                <img id="image" src="" width="100px"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Auther</label>
                                                                <input type="text" class="form-control product_auther" name="product_auther" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Product Price</label>
                                                                <input type="text" class="form-control product_price" name="product_price" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Available Quantity</label>
                                                                <input type="number" class="form-control product_qty" name="product_qty" >
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <button type="submit" name ="submit-form" class="btn btn-primary">submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                           </div>
                                        </div>
                                  </div>
                             </div>
                        </div>
                    </div>
                </div>













<?php
include('footer.php');
?>