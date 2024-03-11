<?php
include "database.php";
session_start();


//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($name,$eid,$token)
{

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Set mailer to use SMTP
    $mail->isSMTP();
    
    // SMTP configuration
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'bistaaashutosh@gmail.com'; // SMTP username
    $mail->Password = 'wtssikpfdajivvka'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
    
    // Sender and recipient information
    $mail->setFrom('bistaaashutosh@gmail.com', 'T-D list'); // Sender's email and name
    $mail->addAddress($eid, $name); // Recipient's email and name
    //Email templates
    $email_template="
    <h2>You have register with T-D list</h2>
    <h5>Verify your email by clicking the link</h5>
    <a href='http://localhost/to-do-list/login/verify-email.php?token=$token'>Click Me!!</a>
    ";
    // Email subject and body
    $mail->Subject = 'Verification of email';
    $mail->Body = $email_template;
    
    // Send the email
    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    



}
 
if(isset($_POST["register"])){
    $name=$_POST['name'];
    $eid=$_POST['eid'];
    $pass=$_POST['pass'];
    $token=md5(rand());
 


    //Email exist or not
    $query="SELECT email FROM user WHERE email='$eid' LIMIT 1";
    $query_rum=mysqli_query($conn,$query);
    

    if(mysqli_num_rows($query_rum)>0){
        $_SESSION['status']="Email already Exists";
        header("Location:login/login.php");

    }else{
        //Insert users data
        $queryinsert="INSERT INTO user(name,email,password,status,verificationcode) VALUES('$name','$eid','$pass',1,'$token')";
        $queryinsert_run=mysqli_query($conn,$queryinsert);
        if($queryinsert_run){
            sendemail_verify("$name","$eid","$token");
            $_SESSION['status']="Registration Sucessfull Please verify your email";
            header("Location:login/register.php");
        }else{
            $_SESSION['status']="Registration fail";
            header("Location:login/login.php");
        }
    }
}

if(isset($_POST["login"])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $querylogin="SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
  $querylogin_run=mysqli_query($conn,$querylogin);
  if(mysqli_num_rows($querylogin_run)>0){
    $row=mysqli_fetch_array($querylogin_run);
    if($row['verify_status']=="1"){
        $_SESSION['authenticated']=TRUE;
        $_SESSION['auth_user']=[
            'username'=>$row['name'],
            'email'=>$row['email'],
            'id'=>$row['id'],
        ];
        $_SESSION['status']="You are loged In";
        header("Location:components/index.php");


    }else{
        $_SESSION['status']="Please verify your email address";
        header("Location:login/login.php");
    }

  }else{
    $_SESSION['status']="Invalid Username or Password";
    header("Location:login/login.php");

  }
}
?> 