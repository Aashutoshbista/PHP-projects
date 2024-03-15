<?php
  
include ('database.php');
include ('authentication.php');

    //initialize cart if not set or is unset
    if(!isset($_SESSION['pdf'])){
      $_SESSION['pdf'] = array();
    }
 
    //unset quantity
    //unset($_SESSION['qty_array']);
  
    $count = count($_SESSION["pdf"]);
    if (isset($_POST["addpdf"])){
        if (isset($_SESSION["pdf"])){
            $item_array_id = array_column($_SESSION["pdf"],"product_id");
            if (!in_array($_POST["pdf_id"],$item_array_id)){//if iteam id is not in the array of item_array_id(session) *** in array means to search in something within array
                $count = count($_SESSION["pdf"]);//count the number of item in session cart
                $item_array = array(
                    'product_id' => $_POST["pdf_id"],
                    'item_name' => $_POST["pdf_name"],
                    'product_price' => $_POST["pdf_price"],
                 
                );
                $_SESSION["pdf"][$count] = $item_array;
                echo "hello";
                echo '<script>window.location="pdftest.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="pdftest.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_POST["pdf_id"],
                'item_name' => $_POST["pdf_name"],
                'product_price' => $_POST["pdf_price"],
              
            );
            $_SESSION["pdf"][0] = $item_array;//initialize the session array
        }
    }

    /*if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["product_id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="cartSample.php"</script>';
                }
            }
        }
    }*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">


  <title>\</title>

  <style type="text/css">
 
        
  .productone{
    width: 223px;
    height: 290px;
    border: solid 1px #ccc;
    float:left;
    padding:20.5px;
  }
  .product{
    width: 223px;
    height: 290px;
    border: solid 1px #ccc;
    float:left;
    padding:20.5px;
  }
  /* Styling the area of the slides */
#slideshow {
  overflow: hidden;
  height: 510px;
  width: 1349px;
  margin: 0 auto;
}
 
/* Style each of the sides
with a fixed width and height */
.slide {
  float: left;
  height: 510px;
  width: 1349px;
  position: relative;
  text-align: center;
  color: white;
}
 
/* Add animation to the slides */
.slide-wrapper {
   
/* Calculate the total width on the
  basis of number of slides */
  width: calc( 1349px* 4);
 
/* Specify the animation with the
  duration and speed */
  animation: slide 10s ease infinite;
}
 
/* Set the background color
of each of the slides */
.slide:nth-child(1) {
  background: green;
}
 
.slide:nth-child(2) {
  background: pink;
}
 
.slide:nth-child(3) {
  background: red;
}
 
.slide:nth-child(4) {
  background: yellow;
}
 
/* Define the animation
for the slideshow */
@keyframes slide {
   
/* Calculate the margin-left for
  each of the slides */
  20% {
    margin-left: 0px;
  }
 
  40% {
    margin-left: calc(-1349px * 1);
  }
 
  60% {
    margin-left: calc(-1349px * 2);
  }
 
  80% {
    margin-left: calc(-1349px * 3);
  }
}
.responsive {
  width: 100%;
  height: 100%;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}   
  


  </style>
 
</head>
<?php include "header.php"; ?>  

  
<body>
<div class="nav">
        <button style="float:right;width:60px;height:20px;margin:0px;background-color:red;"><a href="pdfcheck.php">Cart<?php echo "$count" ?></a></button>
  </div>
  <div class="contain" id="div1" style="width:100%;background-color:grey;overflow:hidden; display:block;" >
    <?php
      $selectQuery = "select * from pdf LIMIT 12";
      $squery = mysqli_query($conn, $selectQuery);
      while ($result = $squery->fetch_object()) {
        $pdf = $result->filename;
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
<!--<?php
// The location of the PDF file
// on the server
//$filename = "pdf/unit 4.pdf";
  
// Header content type
//header("Content-type: application/pdf");
  
//header("Content-Length: " . filesize($file));
  
// Send the file to the browser.
//readfile($file);
?>-->
 <div class="contain" id="div2" style="width:100%;background-color:grey;overflow:hidden;display: none;" >
    <?php
      $selectQuery = "select * from pdf WHERE pdf_id BETWEEN 12 AND 24";
      $squery = mysqli_query($conn, $selectQuery);
      while ($result = $squery->fetch_object()) {
        $pdf = $result->filename;
        $path = $result->directory;
        $file = $path.$pdf;
        $price = $result->price;
        $pdf_id = $result->pdf_id;
        $desc = $result->description;
       //$pdf = $result['filename'];
      //echo "$file";
      //echo " hello" ;
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
   <button onclick="previous()" style="float:right;"> Previous</button>


</div>
  <div id="slideshow">
        <div class="slide-wrapper">
             
            <!-- Define each of the slides
         and write the content -->
            <div class="slide">
             
                    <img src="image/lib.jpg" class="responsive" style="height:100%;" >
                    <div class="centered">YOU CANNOT OPEN BOOK WITHOUT LEARNING SOMETHING</div>
            </div>
            <div class="slide">
            
                        <img src="image/lib1.jpg" class="responsive" >
                        <div class="centered">Everything was so new - the whole idea of going into space was new and daring. There were no textbooks, so we had to write them.<br>
                        Katherine Johnson</div>
            </div>
            <div class="slide">
    
                        <img src="image/lib2.jpg" class="responsive" >
                        <div class="centered">‘It is what we know already that often prevents us from learning.’<br> –Claude Bernard</div>
        
            </div>
            <div class="slide">
     
                        <img src="image/lib3.jpg" class="responsive" style="height:100%;"  >
                        <div class="centered">‘The more I read, the more I acquire, the more certain I am that I know nothing.’<br> –Voltaire</div>

            </div>
        </div>
    </div>

<div class="contain" style="width:100%;background-color:grey;overflow:hidden;height:280px;" >
  <h3 style="text-align: center; background-color:grey;">Free Pdf</h3>
    <?php
      $selectQuery = "select * from pdffree";
      $squery = mysqli_query($conn, $selectQuery);
      while ($result = $squery->fetch_object()) {
        $pdf = $result->filename;
        $path = $result->directory;
        $file = $path.$pdf;
        $pdf_id = $result->pdf_id;
       //$pdf = $result['filename'];
      //echo "$file";
      //echo "$pdf";
      //echo "<br>";
      //echo "$price";
      ?>
      <div class="product" >
            <div class="product1">
              <img src="image/pdf.png" >
                  <h5 class="text-info"><?php echo "$pdf";?></h5>
                  <h5 class="text-danger">Free</h5>
                  <h5 class="text-danger">Description:<br><?php echo "$desc"; ?></h5>
                              
                  <h5><a href="pdfdownload.php?file=<?php echo($pdf)?>">Download Now</a></h5>
             
            </div>
      </div>
       <?php
      }
    ?>
  </div>
<!--<script>
function myFunction() {
  var less = document.getElementById("less");
  var more = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (less.style.display === "none") {
    less.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    more.style.display = "none";
  } else {
    less.style.display = "none";
    btnText.innerHTML = "Read less"; 
    more.style.display = "inline";
  }
}

</script>-->
<?php 
include "footer.php";
 ?>


<script type="text/javascript">
function next() {
document.getElementById("div1").style.display="none"; 
document.getElementById("div2").style.display="block";
 } 
 function previous() {
document.getElementById("div1").style.display="block"; 
document.getElementById("div2").style.display="none"; } 
</script>
</body>
</html>