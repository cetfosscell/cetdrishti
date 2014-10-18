<?php $messages = array('http://sphotos-b.ak.fbcdn.net/hphotos-ak-ash3/165964_160973284056320_122040482_n.jpg',
  'http://sphotos-c.ak.fbcdn.net/hphotos-ak-snc7/385957_160973297389652_1950238137_n.jpg',
  'http://sphotos-h.ak.fbcdn.net/hphotos-ak-ash3/644703_160973300722985_1399313623_n.jpg',
  'http://sphotos-a.ak.fbcdn.net/hphotos-ak-ash3/559804_160973364056312_202059957_n.jpg',
  'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-prn2/q71/s720x720/1175451_172431609610966_54617053_n.jpg'
    ); ?>

	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MindSweeper | Treasure Hunt for First Years</title>
    
    <meta name="author" content="Pranav" >

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	<style type="text/css">
	.c6{width:50%}
	.holer{
	background: #fbfcfc;
	border-radius: 4px;
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
	margin-top: 130px;	
}
.s3 a
{
	text-decoration:none;
	font-family:'Open Sans';
}

.s3{margin-left:25%}
	</style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <!--    <a class="brand" href="http://cetdrishti.com" target="_blank" ><img src="http://www.cetdrishti.com/dcms/img/logo.png" style="margin-top:-17px;width:100px;height:35px"/></a> -->
          
				
				
				
          <div class="nav-collapse collapse">
            <ul class="nav">
          <li class="active">
		<a class="back_h" href="/">Try Again</a>
	 </li> 
	       
        
       </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="c6 holer s3">

        <a href="/"><img src="{{$messages[mt_rand(0,4)]}}"><h2><center>Wrong Answer</center></h2></a>
        
      
    </div>
    <br><br><br><br><br>
  </div>

</body>
</html>