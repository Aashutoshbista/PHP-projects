
  
  <?php

function setcomments($conn) {
    if(isset($_POST['commentSubmit'])){
        //INsert the data to the database
        $Name=$_POST['name'];
        $content=$_POST['msg'];
        $Date=$_POST['date'];
        $Uid=$_POST['email'];
        $book_id=$_POST['book_id'];

        $sql="INSERT INTO comments(Uid, submit_date, content, name,bid) 
        VALUES('$Uid',' $Date','$content','$Name','$book_id')";
        $result = $conn->query($sql);

        }


}



?>
 