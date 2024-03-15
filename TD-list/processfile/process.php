<?php        
include('../database.php');
include('../login/authentication.php');

if(isset($_POST['submit-task'])){
    $task=$_POST['task'];
   
    $uid=$_SESSION['auth_user']['id'];
   

     $querry="INSERT INTO todolist(todo,uid)VALUES('$task','$uid')";
    $query_run=mysqli_query($conn,$querry);
    if($query_run){
        $_SESSION['status']="Your task has been added";
        header("Location:../components/index.php");
    }
    else
    {
        $_SESSION['status']="Fail to add your task";
    header("Location:../components/index.php");
    } 
}

if(isset($_POST['Remove'])){
    
    $id=$_POST['listid'];
    $query="DELETE  FROM todolist WHERE id=$id";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['status']="Removed Succesfully";
     header("Location: ../components/index.php");
 }
 else
 {
    $_SESSION['status']="Fail to Remove";
 header("Location:../components/index.php");
 }
 
 }
 if(isset($_POST['status'])){
    $id=$_POST['listid'];
    $query="UPDATE todolist SET status=1 WHERE id=$id";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['status']="Congratulation on complition of your task";
        header("Location:../components/index.php");
    }else{
        $_SESSION['status']="Failed";
        header("Location: ../components/process.php");
    }
 }


?>