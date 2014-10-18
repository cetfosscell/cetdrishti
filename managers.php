<?php
	require_once 'idi.php';

	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	// connected
	
	$event= ORM::for_table('events')->find_many();
	foreach($event as $ev)
	{
?>
<div class="box span12">
	<div class="box-content">	
	<legend>Manager details</legend>
	<table class="table table-striped table-bordered bootstrap-datatable ">
	<tr><td><?php echo $ev->name; ?></td></tr>
		<table>
		
<?php
		$manager= ORM::for_table('stud_reg')->where('event',$ev->id)->find_many();
		foreach($manager as $man)
		{	
?>
		
		<tr>
		<td><?php echo $man->fname." ".$man->lname; ?>
		</td><td><?php echo $man->mob; ?>
		</td></tr>
		
<?php
	</table>
	
		}
		</table>
	}
	include'footer.php';
?>