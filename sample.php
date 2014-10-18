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
	
	
	
	
?><div id="modal-content">
		<div id="site-content" class="row">
			
			<?php foreach($events as $event) { ?>

				<a class="item" href="events.php?id=<?php echo $event->eve_sname ?>" rel="modal:open">
					<img src="<?php echo $event->feat_image ?>" class="" />
					<h3><?php echo $event->name; ?></h3>
				</a>

			<?php } ?>
			
				
</div>
		
