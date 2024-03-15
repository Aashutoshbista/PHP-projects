<?php
  
include "connection.php";
?> 
<!DOCTYPE html>
<html>
<head>
  <title>\</title>
  <style type="text/css">
  .product{
    width: 223px;
    height: 250px;
    border: solid 1px #ccc;
    float:left;
    padding:20.5px;

  }
  </style>
 
</head>
<body>
  <div class="contain" style="width:100%;background-color:grey;overflow:hidden;" >
    <?php
      $selectQuery = "select * from pdf";
      $squery = mysqli_query($conn, $selectQuery);
      while ($result = $squery->fetch_object()) {
        $pdf = $result->filename;
        $path = $result->directory;
        $file = $path.$pdf;
        $price = $result->price;
       //$pdf = $result['filename'];
      //echo "$file";
      //echo "$pdf";
      //echo "<br>";
      //echo "$price";
      ?>
      <div class="product">
          <form method="post" action="pdf2.php">
            <div class="product1">
              <img src="image/pdf.png" >
                  <h5 class="text-info"><?php echo "$pdf";?></h5>
                  <h5 class="text-danger">Price:Rs<?php echo "$price";?></h5>
                  <h5 class="text-danger"><?php ?></h5>
                              
                  <h5><a href="pdfdownload.php?file=<?php echo($pdf)?>">Download Now</a></h5>
             
                  <input type="hidden" name="pdf_name" value="<?php echo $row["name"]; ?>">
                  <input type="hidden" name="pdf_price" value="<?php echo $row["price"]; ?>">
                  <input type="hidden" name="pdf_id" value="<?php echo $row["item_id"]; ?>">
                        
                  <input type="submit" name="addpdf" style="margin-top: 5px;" class="btn btn-success"
                  value="Add to cart">
            </div>
          </form>
      </div>
       <?php
      }
    ?>
<?php
// The location of the PDF file
// on the server
//$filename = "pdf/unit 4.pdf";
  
// Header content type
//header("Content-type: application/pdf");
  
//header("Content-Length: " . filesize($file));
  
// Send the file to the browser.
//readfile($file);
?>
</div>
<div>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</body>
</html>