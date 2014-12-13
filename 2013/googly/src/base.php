<?php

	include_once('config.php');
	$uid = $_SESSION['ID'];	 	
 	 	$result = mysql_query("SELECT * FROM googly_players where userId='$uid'");
 	 	
 	 	
 	 	while($row = mysql_fetch_array($result))
  		{ 	
  			//var_dump($row);
  			if($row['currentLevel']==11){
  				header("location:src/finish_googly.php");
  			}
 	 	$_SESSION['clue'] = $row['clueNo']; 
 	 	$_SESSION['lvl'] =  $row['currentLevel'];
 	 	$lvlno=	$_SESSION['lvl'] ;
 	 }
 	 $result = mysql_query("SELECT * FROM googly_questions where level='$lvlno'");
 	 	while($row = mysql_fetch_array($result)){ 
 	 			 
 	 		if($lvlno == 1){
 	 		//var_dump($row);	
 	 			
 	 			$_SESSION['start_lat']=$row['lat'];
 	 			$_SESSION['start_lon']=$row['longitude'];
 	 			$question = $row['question']; 
 	 			$lat = $row['lat'];
 	 			$lon = $row['longitude'];
 	 			
 	 		}
 	 		else{
 	 		$result1 = mysql_query("SELECT * FROM googly_questions where level='$lvlno'-1");
 	 		$question = $row['question']; 
 	 		while($row1 = mysql_fetch_array($result1)){
 	 		$_SESSION['start_lat']=$row1['lat'];
 	 		$_SESSION['start_lon']=$row1['longitude'];
 	 		$lat = $row['lat'];
 	 		$lon = $row['longitude'];
 	 		}}
		 }
	$count = 0;	
	$coord_array =  array();

	$result = mysql_query("SELECT lat,longitude from googly_questions where level<'$lvlno' and level > 1 ORDER BY level");
	while($row = mysql_fetch_array($result)){ 		 
			$coord_array[$count] = $row;
			$count++;		
		 }
 		
?>