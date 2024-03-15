<?php
include("authentication.php");
include("include/header.php");
include("include/topbar.php");
include("include/sidebar.php");
include("config/dbcon.php");
?>

<!-- DeleteUser-->
<div class="modal fade" id="Deletemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="pcode.php" method="POST">
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
                                        All Books
                                       
                                    </h4>
                                </div>
                                <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                    <th>Title</th>
                                                    <th>User_Id</th>
                                                    <th>Category</th>
                                                    <th>Auther</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Image</th>
                                                    
                                                    
                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php   
                                                            $query="SELECT * FROM items";
                                                            $query_run= mysqli_query($conn,$query);
                                                            if(mysqli_num_rows($query_run) > 0)
                                                            {
                                                                        foreach($query_run as $row)
                                                                        {
                                                                            //echo $roe['name'];
                                                                            ?>
                                                                                 <tr>
                                                                                        <td><?php echo $row['name'];  ?></td>  
                                                                                        <td><?php echo $row['user_id'];  ?></td>       
                                                                                        <td><?php echo $row['item_cat'];  ?></td>
                                                                                        <td><?php echo $row['Author'];  ?></td>
                                                                                        <td><?php echo $row['price']; ?></td>
                                                                                        <td><?php echo $row['quantity']; ?></td>
                                                                                        <td>
                                                                                            <img src="<?php echo"images/". $row['image']; ?>" alt="img" width="70px">
                                                                                        </td>
                                                                                       
                                                                                        <td>
                                                                                            
                                                                                            <button type="button" value="<?php echo $row['item_id'];?>" class="btn btn-danger deletebtn">Delete</button>
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
include("include/script.php");

?>
<script>
$(document).ready(function(){
    $('.deletebtn').click(function(e){
      e.preventDefault();
        var books_id=$(this).val();
       

        $('.delete_pro_id').val(books_id);
        //pop of model
        $('#Deletemodel').modal('show');
       
    });


});


</script>