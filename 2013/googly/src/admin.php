<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Googly:CETDrishti</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <style type="text/css">
  .start{
	background: #D62222;
	box-shadow: 1px -1px 5px #777;
	padding: 7px;
	text-decoration: none;
	color: white;
	position: absolute;
	top: 60%;
	font-size: 22px;
	left: 20%;
	padding-left: 20px;
	padding-right: 20px;
	}
	.start1{
	background: #D62222;
	box-shadow: 1px -1px 5px #777;
	padding: 7px;
	text-decoration: none;
	color: white;
	position: absolute;
	top: 70%;
	font-size: 22px;
	left: 20%;
	padding-left: 20px;
	padding-right: 20px;
	}
	.didi{
		top:40%;
	}

  </style>
  <!--[if lt IE 9]>
    <script src="js/shiv.js"></script>
  <![endif]-->
  <?php
    session_start();
    if(!array_key_exists('loggedin',$_SESSION)){
      header("location:login.php");
    }
  ?>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  function clear1(){
  	 jQuery.ajax({
            type: "GET", // HTTP method POST or GET
            url: "getajax.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:"required=clear",
            success:function(response){
            $("#responds").empty().append(response);
            $("#ans_field").val(""); //empty text field after successful submission
            },
            error:function (xhr, ajaxOptions, thrownError){
            	alert(thrownError);
            }
        });
  }

  </script>

</head>
<body>
<div id="site-container" class="grid">
        
  <div class="section row">
          <div class="c10 s1 logom">
            <img src="../img/Googlelogo.png" class="c6">
          </div>

  </div> <!--/section or clear -->
  <div class="section row">
   <div id="tabs" class="c6 s4 didi">
  		<ul class="c12">
   			 <li><a href="getajax.php?required=status" >Leaderboard</a></li>
   		 	<li><a href="getajax.php?required=answer">Answer Log</a></li>
 	 	</ul>
	</div>
	 <a onclick="clear1()" class="start">Clear Answer Log</a>
	 <a href="logout.php" class="start1">Logout</a>
	 <p id="responds"></p>
</div>

</body>
</html>
