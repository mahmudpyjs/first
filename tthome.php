<?php

session_start() ;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'\db\tetrisconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Home Page</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="snistyle.css">
</head>


   <div  id="main-wraper">
      <center>
         <h2>Home Page</h2>
         <h3>Welcome
         <?php echo $_SESSION['username']?>
         </h3>
       </center>
  
  <link rel="stylesheet" type="text/css" href="snistyle.css">
  <body style="background-color: #7f8fa6">

  <div id="feedbackcontainer" style="position: fixed; right: 0px; bottom: 435px; background: none; height: 120px; width: 40px; font-size: 14px; font-family: Arial, sans-serif;">
	<button id="feedbackbutton" style="transform: rotate(-90.0deg); background: #18C63A; border-radius: 4px; width: 120px; border: solid 1px #e3e3e3; letter-spacing: 1; padding: 5px 5px; color: #FFF; font-weight: bold; cursor: pointer; float: right; margin-top: 45px; margin-right: -45px" onclick="extendFeedback();">Feedback</button>
	<div id="feedbackform" style="display: none; position: relative; top: -70px; left: 5px">
		<input type="text" id="feedbackemail" name="email" placeholder="your@email" style="width: 290px; border-radius: 3px; border: 1px solid #CCC;  padding: 2px; margin-bottom: 5px;" /><br>
		<textarea id="feedbackmessage" style="width: 290px; height: 150px; border: 1px solid #CCC; border-radius: 3px; padding: 2px; margin-bottom: 5px; font-size: 12px; font-family: Arial, sans-serif;"></textarea><br>
		<button onclick="submitFeedback();" style="padding: 3px; background: #18C63A; border-radius: 4px; width: 120px; border: solid 1px #e3e3e3; color: #FFF; font-weight: bold; cursor: pointer;">Send</button>
	</div>
</div>




<center>
  <div class="grid">
      <canvas id="board" class="game-board"></canvas> 
      <div class="right-column">
          <div>
              <h1 class="tetris">TETRIS</h1>
              <p>Score: <span id="score">0</span></p>
              <p>Lines: <span id="lines">0</span></p>
              <p>Level: <span id="level">0</span></p>
              <canvas id="next" class="next"></canvas>
              <p><button onclick="play()" class="play-button">Play</button></p>
              <p><button onclick="pause()" class="pause-button">Pause</button></P>
          
          </div>
          
          
      </div>
  </div>
</center>

  <script type="text/javascript" src="ttcon.js"></script>
  <script type="text/javascript" src="ttbrd.js"></script>
  <script type="text/javascript" src="ttpiece.js"></script>
  <script type="text/javascript" src="ttmain.js"></script>
  <script type="text/javascript" src="feed.js"></script>
</body>
<form class="myform" action="tthome.php" method="post">
      <input name="logout" type ="submit" id="logout_btn" value="Log Out"/> 
</form>
    <?php
      if(isset($_POST['logout']))
      {
        session_destroy();
        header('location:ttlog.php');
      }
      ?>

      


</html>