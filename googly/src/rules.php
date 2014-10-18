<?php
    session_start();?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Googly:CETDrishti</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <!--[if lt IE 9]>
    <script src="js/shiv.js"></script>
  <![endif]-->
  <?php
   
    if(!array_key_exists('loggedin',$_SESSION)){
      header("location:login.php");
    }
  ?>
</head>
<body>
<div id="site-container" class="grid">
        
  <div class="section row">
          <div class="c10 s1 logom">
            <img src="../img/Googlelogo.png" class="c6">
          </div>

          <a href="start.php" class="start">Let's Race!!</a>
          <div class="c8 s2 rules">
            <h2><img src="../img/rule.png" id="start"></h2>
            <ol>
             <li>
                <p>WELCOME PLAYERS TO<b> DRISHTI'13 GOOGLY</b>!!!.&nbsp;</p>
              </li>
              <li>
                <p>Get ready because this will be a <b>RACE TO THE FINISH</b>!&nbsp;</p>
              </li>
              <li>
                <p>&nbsp;You will face a puzzle at each checkpoint of the race,which on solving will direct you to the next location.</p>
              </li>
               <li>
                <p>Note that remove all the spaces and non alphabetical characters before submitting your answer.<br/>Expand the country name if its in the form 					   of an acronym.</p>
              </li>
              <li>
                <p>Each level will have <b>2 clues</b>.They will made be available one by one after 3 minute intervals.</p>
              </li>
              <li>
                <p>The race will end in <b>60 mins</b>.You will be redirected automatically after the end.</p>
              </li>
              <li>
                <p>The winner will be decided on the status of the players after 60 mins.</p>
              </li>              
              <li>
                <p>&nbsp;The decision of admins shall be final.</p>
              </li><span class="tabulousclear"></span>
            </ol>
          </div>

      

  </div> <!--/section or clear -->

</div>

</body>
</html>