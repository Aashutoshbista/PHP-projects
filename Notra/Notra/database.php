<?php

$server="localhost";
$username="root";
$password="";
$dbname="phpadminpannel";


$conn=mysqli_connect($server, $username,$password,$dbname);
//for to check the connection of data base

/*
if(!$conn){
 echo("db did not connect");    
 die();

}
else{
    echo("DBconnected");
}
*/
?>