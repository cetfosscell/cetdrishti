<?php
session_start();
include_once("config.php");
$uid = $_SESSION['ID'];
$_SESSION['start']=time();
$_SESSION['lvltime']=time();
$_SESSION['done']=false;
$res= ORM::for_table('googly_status')->find_one($uid);
$res1= ORM::for_table('googly_players')->find_one($uid);	
if($res==false){		
	$person = ORM::for_table('googly_status')->create();
	$person->playerId = $uid;
	$person->clue = 0;
	$person->level = 1;
	$person->set_expr('time','NOW()');
	$person->set_expr('start_time','NOW()');
	$person->save();
	$res1->currentLevel =1;
	$res1->set_expr('time','NOW()');
	$res1->save();
	header("Location:../index.php");
}
else{
	if($res->played==1&&$res->level==11){
		$_SESSION['done']=true;
		header("Location:finish_googly.php");
	}else if($res->played==1&&$res->level<11){
		header("Location:timesup.php");
	}else{
			$var1 = strtotime($res->time);
		if($res1!=false){	
			$tmp=ORM::for_table('googly_questions')->find_one(1);	
			$_SESSION['start_lat']=$tmp->lat;
			$_SESSION['start_lon']=$tmp->longitude;
			$tmp->save();		
			$_SESSION['start']= strtotime($res->start_time+19800);			
			$res1->set_expr('time',$var1);
			$res1->currentLevel=$res->level;
			$res1->clueNo=0;
			$res1->save();
			header("Location:../index.php");
		}

	}
}	


?>