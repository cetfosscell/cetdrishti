<?php
	include'header.php';
?>
<?php
	require_once 'idi.php';
	//declare cat
	
	// make the connection
	
	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	
	
	
	
?>

<!-- Subhead
================================================== -->

<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Events </h1>
    <p class="lead"></p>
  </div>
</header>


  <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#cs"><i class="icon-chevron-right"></i> Computer Science</a></li>
          <li><a href="#archi"><i class="icon-chevron-right"></i> Architectural</a></li>
          <li><a href="#ec"><i class="icon-chevron-right"></i> Electronics</a></li>
          <li><a href="#mba"><i class="icon-chevron-right"></i> Management</a></li>
          <li><a href="#mech"><i class="icon-chevron-right"></i> Mechanical</a></li>
          <li><a href="#eee"><i class="icon-chevron-right"></i> Electrical</a></li>
          <li><a href="#robo"><i class="icon-chevron-right"></i> Robocet</a></li>
          <li><a href="#general"><i class="icon-chevron-right"></i> General</a></li>
		  <li><a href="#online"><i class="icon-chevron-right"></i> Online</a></li>
		  <li><a href="#civil"><i class="icon-chevron-right"></i>Civil </a></li>
		  <li><a href="#game"><i class="icon-chevron-right"></i> Gaming</a></li>
		</ul>
      </div>



	<div class="span8">	
<section id="cs">
	
			<div class="">         	<h3>Computer Science</h3>		<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 1)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
</section>
	
		<section id="archi">
			
			<div class="">         		<h3>Architecture</h3>	<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 2)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="ec">
			
			<div class="">         	<h3>Electronics</h3>		<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 3)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="mba">
			
			<div class="">         		<h3>Management</h3>	<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 4)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="mech">
			
			<div class="">         	<h3>Mechanical</h3>		<ul class="nav nav-list">
        			
     
					<?php 
						$events = ORM::for_table('events')->where('group', 5)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="eee">
			
			<div class="">         	<h3>Electrical</h3>		<ul class="nav nav-list">
        			
     
					<?php 
						$events = ORM::for_table('events')->where('group', 6)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="robo">
			
			<div class=""><h3>Robocet</h3>         			
        			<ul class="nav nav-list">     			
     
					<?php 
						$events = ORM::for_table('events')->where('group', 7)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="general">
			
			<div class=""><h3>General</h3>
        			<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 8)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="online">
			
			<div class=""><h3>Online</h3>
        			<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 9)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="civil">
			
			<div class="">         		<h3>Civil</h3>	<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 10)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
<section id="game">
			
			<div class="">         	<h3>Gaming</h3>		<ul class="nav nav-list">
     
					<?php 
						$events = ORM::for_table('events')->where('group', 11)->find_many();	
						foreach($events as $event)
						{
					?>
						<li><a href="events.php?id=<?php echo $event->eve_sname ?>"><?php echo $event->name ?></a></li>
					 <?php
					 	}
					 ?>	
				</ul>
	 		</div>
        </section>
	</div>
		
        

      </div>
    </div>

	


<?php
	include'footer.php';
?>