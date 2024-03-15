<?php        
include('database.php');
session_start();


if(isset($_POST['logout_btn'])){
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status']="Logged out sucessfully";
    header("Location:admin/login.php");
    exit(0);

}


if(isset($_POST['submit-form'])){
    $name=$_POST['product_title'];
    $product_cat=$_POST['category'];
    $product_auther=$_POST['product_auther'];
    $product_description=$_POST['product_desc'];
    $product_price=$_POST['product_price'];
    $product_qty=$_POST['product_qty'];
    $product_img=$_FILES['product_img']['name'];
    $userid=$_SESSION['auth_user']['user_id'];
    $username=$_SESSION['auth_user']['user_name'];
    
    $query="INSERT INTO items(name,Author,describtion,price,image,item_cat,quantity,user_name,user_id) 
    VALUES('$name','$product_auther','$product_description','$product_price','$product_img','$product_cat','$product_qty','$username','$userid')";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        move_uploaded_file($_FILES["product_img"]["tmp_name"],"admin/images/".$_FILES["product_img"]["name"]);
        $_SESSION['status']=" sucess";
        header("Location: index.php");
        }
        else
        {
        $_SESSION['status']=" failed";
        header("Location: index.php");
        }
    
    }
   
    if(isset($_POST['Deleteproduct']))

    {
        $proid=$_POST['deletepro_id'];
        $query="DELETE FROM books WHERE books_id='$proid'"; 
        $query_run = mysqli_query($conn,$query);
        if($query_run){
    
                $_SESSION['status']="Product deleted sucessfully";
                header("Location: userproduct.php");
                }
                else
                {
                $_SESSION['status']="Product deleted fail";
                header("Location: userproduct.php");
                }
    
    }
   
/*
if(isset($_POST['addtocart'])){
        $books_id=$_POST['books_id'];



}



 
*/







?>
