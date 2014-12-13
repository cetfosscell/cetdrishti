<?php if($data==null){
	return Redirect::home();
}?>

	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MindSweeper | Treasure Hunt for first Years </title>
    
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
      <!--     <a class="brand" href="http://cetdrishti.com" target="_blank" ><img src="http://www.cetdrishti.com/dcms/img/logo.png" style="margin-top:-17px;width:100px;height:35px"/></a>
          -->
				
				
				
          <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="active">
                <a href="#" class="c3">Hi {{Auth::user()->username}}</a>	
              </li>
              <li class="">
                <a href="#" class="c2">Rank : {{$rank}}</a>
              </li>
              <li class="">
                <a href="#" class="c2">Level : {{Auth::user()->level}}</a>
              </li>
              <li class="">
                <a href="board" class="c3">Board</a>
              </li>
               <li class="">
               <a href="https://www.facebook.com/mindsweeper14" target="a_blank" class="c3">Clues</a>
              </li>
              <li>
              	<a href="logout" class="c2">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>






		<div class="jumbotron masthead" style="background#000;">
  <div class="container hero-unit" style="background:#ecf0f1;">
<?php if ($data->image) { ?>
		<p class="imga c12" id="imgags"><img  style="width:40%;" src="{{$data->image}}"></p>
<?php	}else {?>
		<p class="faker" ></p>
<?php } ?>
<p class="ques c8 s2" style="color:#555">{{$data->question}}</p>

{{Form::open('answer', 'POST', array('class'=>'form-search form'))}}
<div class="input-append">

        {{Form::text('answer','', array('class'=>'span2 search-query','id'=>'ans','placeholder' => 'answer','required'))}}

        {{Form::submit('Submit', array('class'=>'btn submit'))}}
</div>

{{Form::close()}}

</div></div>

{{$data->html}}
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38749575-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
<?php if($data->hash)
	{?>
	window.location.hash = "<?=$data->hash?>";
<?php } ?>
</script>
</html>