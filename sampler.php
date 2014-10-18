<?php
	require_once 'idi.php';
	//declare cat
	$cat = 0;
	// make the connection
	
	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	// connected
	if(isset($_GET["q"])) {
		$cat = $_GET["q"];
	}
	
	$event_count = ORM::for_table('events')->where('group', $cat)->count();


	//events multiple object

	$events = ORM::for_table('events')->where('group', $cat)->find_many();
	
	
	
	
?><div id="modal-contente">
	<div id="site-content">
		<div class="wrapper">
			<div  class="inner-wrapper">
			
			
			
			<?php foreach($events as $event) { ?>

				<a class="one-col item" href="works.php?id=<?php echo $event->eve_sname ?>" rel="modal:open">
					<img src="<?php echo $event->feat_image ?>" class="" />
					<h3><?php echo $event->name; ?></h3>
				</a>

			<?php } ?>
			
			
			</div>	
		</div>
	</div>
<style>
.pure-u-1-3 {
width: 28%;
}
.item h3{
font-family: 'existencelight','Open Sans';
  font-size: 20px;
  color: #fff;
  text-align: center;
  }
</style>
		