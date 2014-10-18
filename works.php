<?php
	require_once 'idi.php';
	session_start();
	//get the id of post
	
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
	}
	
	// make the connection
	
	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	// connected
	
	$event= ORM::for_table('events')->where('eve_sname', $id )->find_one();
	$managers=ORM::for_table('stud_reg')->where('event', $event->id )->find_many();
	
	$n_id=$event->id;
	
?>

<div id="modal-content">
	<?php if(isset($_SESSION['email_drs'])) {?>
		<a 
			href="#" 
			data-0=" top:70%;" 
			data-200="top:150%;"
		data-eveid="<?=$n_id ?>"
		class="cart_icon indi_click">Register For This Event</a>

		<?php }else{ ?>
			<a href="#logi-mon	" style="position:absolute;top:5px;left:5px;z-index:1;" class="sub_form login-form-link" rel="modal:open">LOGIN</a>
		<?php } ?>
		
	<h2 class="modal-head"><?php echo $event->name ?></h2>
	<img src="<?php echo $event->feat_image ?>" class="modal-img">
	<p class="modal-p1"><b>Entry Fees&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php
						$prize=$event->prize1+$event->prize2;
						if($event->prize1!=0)
						 echo "Rs. ".$prize ;
						else
						 echo "Will be updated soon";
						 ?></p></b>
<!--	<p class="modal-p2"><?php 
						if($event->prize1!=0)
						{
							if($event->prize2!=0)
							{
							?>
							Second Prize: 
							<?php
						 		echo "Rs. ".$event->prize2; 
							}
						}
						else
						{
							if($event->prize2==0)
							{
							?>
							Second Prize: 
							<?php
						 		echo "Will be updated soon"; 
							}
						
						}
						 
						?></p> -->
						
<div id="tabs">
		<ul>
			<li><a data-ref="#tabs-1" title="">Description</a></li>
			<li><a data-ref="#tabs-2" title="">Details</a></li>
			<li><a data-ref="#tabs-3" title="">Contact</a></li>
		</ul>

		<div id="tabs_container">
			

			<div id="tabs-1" class="ni-tab">
				<!--tab content-->
				<?php echo $event->descr ?>
			</div>
			<div id="tabs-2" class="ni-tab">
				<!--tab content-->
				<?php echo $event->eve_format ?>
			</div>

			<div id="tabs-3" class="ni-tab">
				<!--tab content-->
				<p><?php 
					foreach($managers as $man)
					{?>
					<b><?php
						echo $man->fname;
						echo " ";
						echo $man->lname;
						?>
					</b>
					<br>
					<?php
						echo $man->email_drs;?>
					
					<br>+91-
					<?php
						echo $man->mob;?>
					
					<br>
					<?php	
					}
				?></p>
			</div>
			
			
		
		</div><!--End tabs container-->
		
					
	
</div><!--End tabs-->
</div>

<script type="text/javascript">
	$(document).ready(function ($) {

    $('#tabs').tabulous();	

     $('.indi_click').click(indi_click);
    

});
</script>