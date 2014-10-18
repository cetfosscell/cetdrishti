<!doctype html>
<html lang="en">
<head>
	<title>BrainStrain | leaderboard</title>
  <meta name="description" content="brainstrain is the online treasure hunt as a part of dhwani13 cet">
  <meta name="keywords" content="online,treasure,hunt,cet,dhwani,cetdhwani,13,puzzle,">
  <meta property="og:site_name" content="brainstrain is the online treasure hunt as a part of dhwani13 cet">
<meta property="og:title" content="Brainstrain13">
<meta property="og:description" content="Be warned, this person may undergo a meltdown any time, he has taken the ultimate triage and started playing brainstrain">
<meta property="og:image" content="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/373159_158083080875524_1132952370_q.jpg">
<meta property="og:url" content="http://treasure.cetdhwani.com">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body class="wfull">
	<a class="back_h" href="/">Back Home</a>
	<div class="row">

		<div class="wrap c8 s2">

			<div class="head c12">
				<h1 class="c5">Leaderboard</h1>
				<div class="c7">
					<p class="c12 no_mar">
					<span class="big_no">{{$total}}</span>Sparky's playing so far
				</p>
				<p class="c12 no_mar">
					<span class="c3 dc">Level</span> <span class="c2 s5 dc">Points</span>
				</p>

				</div>

			</div>

			<?php
			
				$i = 1;
			
			 $i=1; foreach ($board as $order): ?>
			<div class="row hov">
			<p class="c1 bubb">{{$i}}</p>
			<p class="c4 ">{{$order->username}}</p>
			<p class="c3">{{$order->level}}</p>
			<p class="c4">{{$order->point}}</p>
			</div>
		<?php $i++; endforeach; 
		 ?>

	</div>


</div>


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

</script>
</html>