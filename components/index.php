<?php
include "../login/authentication.php";
include "../headerfooter/header.php";
include "navbar.php";
include "../database.php";
?>
<!---->
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
<form action="../processfile/process.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
   
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<!-- Text area  -->  

                 <div class="form-floating">
                <textarea class="form-control" placeholder="" name="task" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Add your Task</label>
                </div> 
                <!-- Text area  -->   

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit-task" class="btn btn-primary ">Submit</button>
      </div>
 
    </div>
  </div>
</div>

</form>


<!---->












<div class="container">
<table class="table table-bordered ">
    <div class="heading row mt-4">
        <div class="head col">
    <h1 class="headingofclass">To-Do-list:</h1>
    </div>
    <div class="button col text-center">
    <!-- <button type="button" class="btn btn-primary ">Add</button>  -->
   <!--   -->
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add
</button>
    </div>   
</div>

    <thead>
     
    <tr >
      <th class="col-md-2">No</th>
      <th class="col-md-8">List</th>
      <th class="col--md-4">Actions</th>
      
      
    </tr>
  
  </thead>
  <tbody >
  <?php
        $query="SELECT * FROM todolist  WHERE status=0 AND uid={$_SESSION['auth_user']['id']}";
  
        $query_run=mysqli_query($conn,$query);
        if($query_run){
          if(mysqli_num_rows($query_run) > 0){
            $rows=1;
            foreach($query_run as $val)
            {
              
              
      ?>
    <tr>
      <form action="../processfile/process.php" method="post">
      <th scope="row"><?php echo $rows?></th>
      <?php $rows++;?>
      
      <td><?php echo $val['todo'];?></td>
      <td><button class="btn btn-success btn-sm" name="status" >Complete</button>
      <input type="hidden" name="listid" value="<?php echo $val['id']?>">
      <button class="btn btn-secondary btn-sm" name="Remove" >Remove</button>
    
    </td>
    </form> 
    </tr>
    
    <?php
    
    }
  }else{
    ?>
    <th scope="row">1</th>
      <td>No List found</td>
      
    </td>
    <?php
  }
}
else{
  echo("Error");
}

?>

  </tbody>
</table>

 
</div>
<?php
include "../headerfooter/footer.php";

?>
  
  
    