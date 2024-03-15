<?php
include('authentication.php');
include('config/dbcon.php');

/*here is code for to add books */
if(isset($_POST['submit-form'])){
    $name=$_POST['product_title'];
    $product_cat=$_POST['category'];
    $product_auther=$_POST['product_auther'];
    $product_description=$_POST['product_desc'];
    $product_price=$_POST['product_price'];
    $product_qty=$_POST['product_qty'];
    $product_img=$_FILES['product_img']['name'];


 $query="INSERT INTO items(name,Author,describtion,price,image,item_cat,quantity) 
 VALUES('$name','$product_auther','$product_description','$product_price','$product_img','$product_cat','$product_qty')";
 $query_run=mysqli_query($conn,$query);
 if($query_run){
     move_uploaded_file($_FILES["product_img"]["tmp_name"],"images/".$_FILES["product_img"]["name"]);
     $_SESSION['status']=" sucess";
     header("Location: addproduct.php");
     }
     else
     {
     $_SESSION['status']=" failed";
     header("Location: addproduct.php");
     }
 
 }
/*delete product code  */

if(isset($_POST['Deleteproduct']))

{
    $proid=$_POST['deletepro_id'];
    $query="DELETE FROM items WHERE item_id='$proid'"; 
    $query_run = mysqli_query($conn,$query);
    if($query_run){


            $_SESSION['status']="Product deleted sucessfully";
            header("Location: product.php");
            }
            else
            {
            $_SESSION['status']="Product deleted fail";
            header("Location: product.php");
            }

}



/*Update product 
if(isset($_POST['updateproduct']))
{
    $name=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_auther=$_POST['product_auther'];
    $product_description=$_POST['product_desc'];
    $product_price=$_POST['product_price'];
    $product_qty=$_POST['product_qty'];
    $product_img=$_FILES['product_img']['name'];


    $query_up="UPDATE  books SET books_name='$name',product_cat='$product_cat',books_auther='$product_auther',books_discription='$product_description',books_price='$product_price',book_quantity='$product_quantity',book_cat="$product_cat"  WHERE id='$user_id'";


    
    $query_up_run = mysqli_query($conn,$query);
    if($query_up_run){

            $_SESSION['status']="User updated sucessfully";
            header("Location: register.php");
            }
            else
            {
            $_SESSION['status']="User updated fail";
            header("Location: register.php");
            }

}
*/
?>