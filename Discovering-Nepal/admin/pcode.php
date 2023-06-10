<?php
include('authentication.php');
include('config/dbcon.php');

/*here is code for to add books */
if(isset($_POST['submit'])){
    $name=$_POST['p_name'];
    $p_prov=$_POST['provinces'];
    $p_longitude=$_POST['p_longitude'];
    $p_description=$_POST['p_description'];
    $p_latitude=$_POST['p_latitude'];
    $p_cat=$_POST['catagory'];
    $dataofcat=implode(",",$p_cat);
    $p_type=$_POST['type'];
    
    
    
    $p_img=$_FILES['p_img']['name'];



 $query="INSERT INTO places(p_name,p_longitude,p_latitude,p_discription,p_image,p_catagory,p_prov,p_type) 
 VALUES('$name','$p_longitude','$p_latitude','$$p_description','$p_img','$dataofcat','$p_prov','$p_type')";
 $query_run=mysqli_query($conn,$query);
 if($query_run){
     move_uploaded_file($_FILES["p_img"]["tmp_name"],"images/".$_FILES["p_img"]["name"]);
     $_SESSION['status']=" sucess";
     header("Location: AddPlace.php");
     }
     else
     {
     $_SESSION['status']=" failed";
     header("Location: AddPlace.php");
     }
 
    }
/*delete product code  */

if(isset($_POST['Deleteplace']))

{
    $placeid=$_POST['deleteplace_id'];
    $query="DELETE FROM places WHERE p_id='$placeid'"; 
    $query_run = mysqli_query($conn,$query);
    if($query_run){


            $_SESSION['status']="Place deleted sucessfully";
            header("Location: Places.php");
            }
            else
            {
            $_SESSION['status']="Place deleted fail";
            header("Location: Places.php");
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