<?php
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\htdocs\config.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\db\tetrisconfig.php');
//require "config.php";
    
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Of Mahmudul Hasan</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="snistyle.css">
</head>

   <body>
   <div class="container">
        <nav class="navbar navbar-light" style="background-color: rgb(221, 250, 226); margin-bottom: 30px; font-weight:bold;">
          <a class="navbar-brand" href="About.html">About Me</a>
          
        </nav>
      </div>
 
   <style>
        body {
          background-image: url('tetim2.jpg');
        }
        </style>

   <div  id="main-wraper">
  
      <center>
         <h2> Registration Form</h2>
         </center>
         
         
         
        
      
      <form class="myform" action="ttreg.php" method="post">
        <label><b> Username:</label><br>
        <input name ="username" type ="text" class="inputvalues" placehoder="" required/><br>
        <label><b> Password:</label><br>
        <input name="password" type ="Password" class="inputvalues" placehoder="" required/><br>
        <label><b> Confirm Password:</label><br>
        <input name ="cpassword" type ="password" class="inputvalues" placehoder="" required/><br>
        <input name="submit_btn" type ="submit" id="signup_btn" value="Sign Up"/>
        <a href="ttlog.php"><input type ="button" id="back_btn" value="Back"/></a> 
         
    </form>  
      
   <?php
         if(isset($_POST['submit_btn']))
      {  
          
          $username=$_POST['username'];
          $password=$_POST['password'];
           $cpassword=$_POST['cpassword'];   

           if($password==$cpassword)
       {
          $query ="SELECT * FROM user WHERE username='$username' "; 
          

           $query_run=mysqli_query($con,$query);

           if(mysqli_num_rows($query_run)>0) 
           {
            echo '<script type="text/javascript"> console.log ("try another user name") </script>';
           }
           else
           { 
            $query ="insert into user values('$username', '$password')"; 
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
               echo '<script type="text/javascript"> console.log  ("user registered") </script>';

            }
            
            else{
               echo '<script type="text/javascript"> console.log  ("error") </script>';

            }
            
           }
         }
         else {
            echo '<script type="text/javascript"> console.log  ("password and confirm password is not matching") </script>';

         }
      }
      ?> 
    </div>
   </p>
    
</body>
</html> 