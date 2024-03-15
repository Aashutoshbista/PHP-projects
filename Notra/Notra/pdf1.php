<!-- For read pdf Files-->
<?php 
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
    $selectQuery = "select * from pdf";
    $squery = mysqli_query($conn, $selectQuery);
 
       while ($result = $squery->fetch_object()) {
        $pdf = $result->filename;
        $path = $result->directory;
        $file = $path.$pdf;
       //$pdf = $result['filename'];
 	} 
 	//echo "$path";
 	//echo "$file";
 	//echo "$pdf";

//$file = '$pdf';
//$filename = '$pdf';

  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $file . '"');
  
header('Content-Transfer-Encoding: binary');
  
//header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);

	//@readfile($pdf);
	?>

</body>
</html>