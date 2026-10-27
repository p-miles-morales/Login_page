<?php
require "db.php";
session_start();

$stmt=$conn->prepare("SELECT * FROM student");
$stmt->execute();
$result=$stmt->get_result();
// if(isset($_SESSION['registered'])){

// echo $_SESSION['registered'];
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        
        body{
            background-color: rgb(99, 226, 163);
            color: black;
        }
        .box{
            display: flex;
            flex-direction: column;
            
        }
        fieldset{
            width: 300px;
            margin: auto;
            background-color: rgb(235, 243, 239);;
            border-radius: 20px;
            border : 3px;
            align-content: center;
            box-shadow: rgb(25, 26, 26);
            flex-direction: column;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        h1{
            font-size: x-large;
             font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
             color: rgb(0, 255, 255);
             text-align: center;
        }
        .field {
            align-items: center;

        } 
        input[type="text"],input[type="email"],input[type="number"]{
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border-color:black;
            flex-direction: column;

        }
        label{
            border-radius: 5px;
        }
        input[type="submit"]{
            padding: 10px 20px;
            background-color: rgb(0, 255, 255);
            color: black;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .emailmessage{
            color: red;
            font-size: 14px;
        }
        .errorMessage{
            background-color: green;
            font-size: 24px;
            color: white;
            padding: 20px;
            height: 20px;
            width: 400px;
            border-radius: 10px;
        }

    </style>
</head>
<body>


<form action="insert.php" method="POST">
       <fieldset>
    <?php
if(isset($_SESSION['registered'])){
  echo "<h3 class='errorMessage'>" . $_SESSION['registered'] . "</h3>";
  unset($_SESSION['registered']);

}
if(isset($_SESSION['emailerror'])){
  echo "<h3 class='errorMessage'>" . $_SESSION['emailerror'] . "</h3>";
   unset($_SESSION['emailerror']);
}
if(isset($_SESSION['invalidEmail'])){
  echo "<h3 class='errorMessage'>" . $_SESSION['invalidEmail'] . "</h3>";
    unset($_SESSION['invalidEmail']);
}
?>

    <h1>Registration Form</h1>
      <fieldset>
        <div class="field">
            <div class="box">
    Full Name <input type="text" name="fullname"><br>
    </div>
     <div class="box">
    Age <input type="number" name="age"><br>
    </div>
    
    <label for="">Gender</label>
    <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Male">Male <br>
       
    </select>
    <br>
     <div class="box">
    Phone Number <input type="text" name="phone"><br>
    </div>
     <div class="box">
    Email <input type="email" name="email"><br><br>
    <input type="submit" name="submit" value="Register">
    </div>
    </div>
       </fieldset>

</form>
