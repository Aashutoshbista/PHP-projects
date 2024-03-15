<?php
include "../login/authentication.php";
include "../Headerfooter/header.php";
include "navbar.php";
include "../database.php";
?>



<div class="container">
<table class="table table-bordered ">
    <div class="heading row mt-4">
        <div class="head col">
    <h1 class="headingofclass">Completed:</h1>
    </div>
   
</div>

    <thead>
     
    <tr >
      <th class="col-md-2">No</th>
      <th class="col-md-8">List</th>
      
      
      
    </tr>
  
  </thead>
  <tbody >
  <?php
        $query="SELECT * FROM todolist  WHERE status=1 AND uid={$_SESSION['auth_user']['id']}";
  
        $query_run=mysqli_query($conn,$query);
        if($query_run){
          if(mysqli_num_rows($query_run) > 0){
            $rows=1;
            foreach($query_run as $val)
            {
              
              
      ?>
    <tr>
     
      <th scope="row"><?php echo $rows?></th>
      <?php $rows++;?>
      
      <td class="bg-success"><?php echo $val['todo'];?></td>
      
    
    </td>
   
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
  
  
    