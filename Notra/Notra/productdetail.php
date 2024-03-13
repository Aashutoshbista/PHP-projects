<?php
include('authentication.php');
include('header.php');
include('database.php');
include('comment.in.php');?>
<!--product detail start section-->
<?php

if(isset($_GET['books_id'])){
    $books_id = $_GET['books_id'];
   
    $query="SELECT * FROM items WHERE item_id=$books_id";
    $query_run=mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
            ?>

                <section class="mb-5 m-1">

                <div class="row ">
                
                <div class="col-md-6 mb-4 mb-md-0 ">
               
                        
                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox col-lg-8 col-md-12 col-sm-6 rounded mx-auto d-block mb-0 ">

                    <div class="row product-gallery mx-1">

                        <div class="">
                        <figure class="view overlay rounded z-depth-1 main-img"><!--image-->
                        <img class="img-fluid w-100 image-size" src="<?php echo"admin/images/". $row['image']; ?>"  alt="img" height="100%"  >
                                        
                </a>
                </figure>
             
             </div>
             
           </div>
   
         </div>
   
       </div>
       <div class="col-md-6">
       <h5><?php echo $row['name'];?></h5>
  
        
  <p class="pt-1"><?php echo $row['describtion'];?></p>
  <div class="table-responsive">
          <table class="table table-sm table-borderless mb-0">
            <tbody>
             
              <tr>
                <th class="pl-0 w-25" scope="row"><strong>publisher:</strong></th>
                <td>
                    <strong>
                    <?php echo $row['Author'];?></td>
                    </strong>
              </tr>
              
            
            </tbody>
          </table>
        </div>
        <p><span class="mr-1"><strong>Price:$<?php echo $row['price'];?></strong></span></p>
        <hr>
        


     

       
    </div>

    <div class="row">
    
        
    <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-1 mt-1">
        
        <?php
            echo"<form id='algin-form' class='comment-form' method='POST' action='".setcomments($conn)."'>
                        <div id='form-group'class='form-group-comment'>
                            <h4>Leave a comment</h4>
                            <label for='message'>Message</label>
                            <textarea name='msg' id='msg' cols='30' rows='5' class='form-control' style='background-color:white;'></textarea>
                        </div>
                        <div id='form-group'class='form-group'>
                            
                            <input type='hidden' name='name' id='fullname' class='form-control' style='background-color:white;'value='".$_SESSION['auth_user']['user_name'] ."'>
                        </div>
                        <div id='form-group'class='form-group'>
                            
                            <input type='hidden' name='date' id='fullname' class='form-control' value='".date('Y-m-d H:i:s')."'>
                        </div>
                        <div id='form-group'class='form-group'>
                            
                            <input type='hidden' name='book_id' id='fullname' class='form-control' value='$books_id'>
                        </div>

                        <div  id='form-group'class='form-group'>
                            
                            <input type='hidden' name='email' id='email' class='form-control' style='background-color:white;'
                            value='".$_SESSION['auth_user']['user_email'] ."'>
                        </div>
                        
                        <div id='form-group'class='form-group'>
                            <button type='submit' id='post' name='commentSubmit' class='btn'>Post Comment</button>
                        </div>
                    </form>";
                   
        ?>            
        </div>
        <?php
    echo"<div class='col-lg-5 col-sm-10 col-md-8 col-12 pb-4 offset-sm-1' >";
        echo" <h1>Comments</h1>";
       
        $sql="SELECT * FROM comments  WHERE bid=$books_id";
        $result = $conn->query($sql);
        
        while($row=$result->fetch_assoc()){
           echo" <div class='comment-box text-justify white mt-4 float-right'><p>";
        echo"<img src='https://i.imgur.com/CFpa3nK.jpg' alt='' class='rounded-circle' width='40' height='40'>";
        echo $row['name'];echo"-";
         echo $row['submit_date']."<br><br>";
    
        
        echo $row['Uid']."<br><br>";
        
        echo nl2br($row['content']);
    echo"</p></div>";
    
            }
       
    
   echo" </div>";
    
    ?>
  
  </section>
  <?php
    }

}
}

?>    
<!-- comment section -->

    
       
  <!--product details end section-->
  <?php
 include('footer.php');?>