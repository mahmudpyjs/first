<?php
session_start();
//require "db/config.php";
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\db\tetrisconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="snistyle.css">
</head>
<body style="background-color: #7f8fa6">
<style>
        body {
          background-image: url('tetim2.jpg');
        }
        </style>



   <div  id="main-wraper">
      <center>
         <h2> Login Form</h2>
       </center>
         
    <form class="myform" action="ttlog.php" method="post">
        <label> Username:</label><br>
        <input name="username" type ="text" class="inputvalues" placehoder=""/><br>
        <label> Password:</label><br>
        <input name="password" type ="Password" class="inputvalues" placehoder=""/><br>
        <input name="login" type ="Submit" id="login_btn" value="Login"/><br>
        <a href="ttreg.php"><input type ="button" id="register_btn" value="Register"/></a>
    
      
    
    <?php
         if(isset($_POST['login']))
      {  
      
      $username=$_POST['username'];
      $password=$_POST['password'];
      $query="select * from user WHERE username='$username' AND password='$password'";
      $query_run=mysqli_query($con,$query);
         if(mysqli_num_rows($query_run)>0)
         {
            $_SESSION['username']=$username;
            header('location:tthome.php');
         }
         else
         {
           
               echo'<script type ="text/javascript"> console.log ("invalid")</script>';
            }
            

         }
         ?>

      
    </div>
    
</body>
</html> 