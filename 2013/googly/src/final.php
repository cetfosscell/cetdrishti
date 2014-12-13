<?php
	include_once('config.php');
	session_start();
	$uid = $_SESSION['ID'];
  	if(array_key_exists('done',$_SESSION)){
    if($_SESSION['done']==false){
   		 header("location:../index.php");
  	}
  else{
  	$person = ORM::for_table('googly_status')->find_one($uid);
	$person->played = 1;
	$person->save();
    session_destroy();
  }
}
else{
	 header("location:login.php");
}

?>