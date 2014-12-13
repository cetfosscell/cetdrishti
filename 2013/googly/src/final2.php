<?php 
	session_start();
	include_once('config.php');
	$person = ORM::for_table('googly_status')->find_one($uid);
 	 if($person->played==1&&$person->level==11){
    
    header("location:finish_googly.php");
  
}
else if(strcmp($_GET['action'],"timeover")==0){
	$person->played=1;
	$person->save();
	header("location:timesup.php");
}
  session_destroy();
  
  ?>