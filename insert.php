<?php

require "db.php";
session_start();


if($_SERVER["REQUEST_METHOD"]==="POST"){

if(isset($_POST['submit'])){

  $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];



  if (empty($fullname)|| empty($email)
    ||empty($phone)|| empty($gender)){
$_SESSION['emailerror']="Ensure all the fileds are filled";
header('Location: index.php');
exit();
  }
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $_SESSION['invalidEmail']="Ensure email is valid";
     header('Location: index.php');
     exit();
 }
//   echo"<pre>";
//    var_dump($_POST);
//    echo "</pre>";
//    die();


 $sql="INSERT INTO student(full_name,age,email,phone,gender)VALUE(?,?,?,?,?)";

 $stmt=$conn->prepare($sql);
 $stmt->bind_param('sisss',$fullname,$age,$email,$phone,$gender);
if($stmt->execute()){
  //
$_SESSION['registered']="Student registered successfully";
header('Location: index.php');
exit();
}else {
  echo"Student not registered successfully".$stmt->error;
}
  $stmt->close();

}
}