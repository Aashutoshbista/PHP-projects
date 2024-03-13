<?php 

$file = "pdffree/" . $_GET['file'];
echo "$file";
header("content-disposition: attachment; filename= ".urldecode($file));
$fm =fopen($file, 'r');
//echo "$fm";
while (!feof($fm)) {
	echo fread($fm, 8192);
}
fclose($fm);
?>