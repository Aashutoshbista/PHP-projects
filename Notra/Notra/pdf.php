<?php 
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	<title></title>
  <style type="text/css">
    input{
      width:50%;
    }
    h2{
      padding-left:50px;
    }
  </style>
</head>
<body>
      <div class="col-lg-6 col-md-6 col-12">
            <strong>Upload PDF</strong>
                <form method="post" enctype="multipart/form-data">
                    <?php
                        // If submit button is clicked
                        if (isset($_POST['submit']))
                        {
                          // get name from the form when submitted
                          $name = $_POST['price']; 
                          $desc = $_POST['desc'];                   
 
                        //if (isset($_FILES['pdf_file']['name']))
                          //{  
                          // If the ‘pdf_file’ field has an attachment
                            $file_name = $_FILES['pdf_file']['name'];
                            $file_tmp = $_FILES['pdf_file']['tmp_name'];

                             //echo "$file_name";
                             //echo "$file_tmp";
                            // Move the uploaded pdf file into the pdf folder
                            move_uploaded_file($file_tmp,"./pdf/".$file_name);
                            // Insert the submitted data from the form into the table
                            $insertquery =
                            "INSERT INTO pdf(filename,price,description) VALUES('$file_name','$name','$desc')";
                             
                            // Execute insert query
                            $iquery = mysqli_query($conn, $insertquery);     
 
                            if ($iquery)
                               {                            
                    ?>                                             
                                <div class="alert alert-success alert-dismissible fade show text-center">
                                    <a class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong>Success!</strong> Data submitted successfully.
                                  </div>
                                <?php
                                }
                                else
                                {
                                ?>
                                  <div class="alert alert-danger alert-dismissible fade show text-center">
                                    <a class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <strong>Failed!</strong> Try Again!
                                  </div>
                                <?php
                                }
                           	}
                            //else
                            //{
                              ?>
                                
                              <?php
                            //}// end if
                        // end if
                    ?>


			</form>
		</div>
<?php
    // If submit button is clicked
    if (isset($_POST['fsubmit']))
        {
 		// get name from the form when submitted                   
 		//if (isset($_FILES['pdf_file']['name']))
 		//{  
 		// If the ‘pdf_file’ field has an attachment
   		$file_name = $_FILES['pdf_file']['name'];
   		$file_tmp = $_FILES['pdf_file']['tmp_name'];

    		//echo "$file_name";
    		//echo "$file_tmp";
   		// Move the uploaded pdf file into the pdf folder
   		move_uploaded_file($file_tmp,"./pdffree/".$file_name);
   		// Insert the submitted data from the form into the table
   		$insertquery =
   		"INSERT INTO pdffree(filename) VALUES('$file_name')";
                             
   		// Execute insert query
   		$iquery = mysqli_query($conn, $insertquery);     
 
            if ($iquery)
                               {                            
    ?>                                             
                <div class="alert alert-success alert-dismissible fade show text-center">
                    <a class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Success!</strong> Data submitted successfully.
                  </div>
                <?php
                }
                else
                {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show text-center">
                    <a class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>
               <?php
                }
            }
            else
            {
              ?>
        
              <?php
            }// end if
                        // end if
    ?>
    <div style="margin:5px;">
    <h2> Permium Pdf</h2>
	<form method="post" enctype="multipart/form-data">
    <div class="form-input py-2" >                           
    	<div class="form-group" style="padding-left:50px;">
          <input type="file" name="pdf_file"
                 class="form-control" accept=".pdf"
                 title="Upload PDF" style="width:50%;padding-left:50px;" />
        </div>
        <div class="form-group" style="padding-left:50px;">
          <input name="price"
                 class="form-control"
                 title="Input Price" value="Price" style="width:50%; padding-left:50px;"/>
        </div>
        <div class="form-group" style="padding-left:50px;">
          <input name="desc"
                 class="form-control"
                 title="Input Description" value="Input Description" style="width:50%; padding-left:50px;" />
        </div>

        <div class="form-group"style="padding-left:50px;">
          <input type="submit" class="btnRegister"
                 name="submit" value="Submit">
        </div>

   	</div>
	</form>
	</div>
	<div>
	<h2>Free Pdf</h2>
	<form method="post" enctype="multipart/form-data">
    <div class="form-input py-2" style="padding-left:50px;">                           
    	<div class="form-group">
          <input type="file" name="pdf_file"
                 class="form-control" accept=".pdf"
                 title="Upload Free PDF" style="width:50%; padding-left:50px;"/>
        </div>
         </div>
           <div class="form-group" style="padding-left:50px;">
          <input name="desc" class="form-control" title="Input Description" value="Input Description" style="width:50%; padding-left:50px;" />
        </div>
        <div class="form-group" style="padding-left:50px;">
          <input type="submit" class="btnRegister"
                 name="fsubmit" value="Submit">
       

   	</div>
	</form>
	</div>
	<?php
        $selectQuery = "select * from pdf";
        $squery = mysqli_query($conn, $selectQuery);
 
        while (($result = mysqli_fetch_assoc($squery))) {
       
 		$pdf = $result['filename'];
 	}
 	//echo $pdf;
		?>
	<div>
		<?php
		@readfile($pdf);
		?>
	</div>
</body>
</html>