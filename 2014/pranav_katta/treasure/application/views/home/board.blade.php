<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MindSweeper | Treasure Hunt for first Years</title>
    
    <meta name="author" content="Pranav" >

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

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
       <!--   <a class="brand" href="http://cetdrishti.com" target="_blank" ><img src="http://www.cetdrishti.com/dcms/img/logo.png" style="margin-top:-17px;width:100px;height:35px"/></a> -->
          <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="">
                <a href="/" class="c3">Home</a>		
              </li>
              <li class="active">
                <a href="board" class="c3">Board</a>
              </li>
              <li class="">
                <a href="rules" class="c3">Rules</a>
              </li>
               <li class="">
               <a href="https://www.facebook.com/mindsweeper14" target="a_blank" class="c3">Clues</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<style type="text/css">
 
@import url(http://fonts.googleapis.com/css?family=Jim+Nightshade|Rosario);
.rules_box
 {
 	width:65%;
 	margin-left:17.5%;
 	margin-right:17.5%;
 	text-align:justify;
 	padding:10px;
 	
 	border-radius:5px;
 	background:#fff;
 	color:#000;
 }
.main_head
{
	margin-left:35%;
	margin-right:35%;

}
.color_rank
{
	font-weight:bold;
}
</style>

<div class="jumbotron masthead">

<div class="rules_box">
<div class="main_head">
<h1 style="color:#000;
	font-size:55px;font-family:'Jim Nightshade';">LEADERBOARD</h1><p style="font-size:18px;"><b style="color:red;font-size:29px;font-family:'Jim Nightshade';">&nbsp;&nbsp;{{$total}}</b> Sparky&#39;s playing so far</p>
	</div>			
 <table class="table table-hover">
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Name</th>
                  <th>Level</th>
                </tr>
              </thead>
              <tbody>
                
                <?php
				$i = 1;			
		 $i=1; foreach ($board as $order):
		 if($i==1)
		 {
		 		$f2f="error"; 
		 		$ff2="color_rank";
		 }
		 else if($i==2)
		 {
		 		$f2f="warning"; 
		 		$ff2="color_rank";
		 }
		 else if($i==3)
		 {
		  		$f2f="success";
		 		 		$ff2="color_rank";
		 }
		else
		{
		 		$f2f="";
		 		$ff2="";
		 }?>
		<tr class="<?php echo $f2f; ?>"> 	
		  <td class="<?php echo $ff2; ?>">{{$i}}</td>
                  <td class="<?php echo $ff2; ?>">{{$order->username}}</td>
                  <td class="<?php echo $ff2; ?>">{{$order->level}}</td>
                </tr>
           
              <?php $i++; endforeach; 
		 ?>
		    </tbody>
                
</table>
</div></div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>


 

  </body>
</html>