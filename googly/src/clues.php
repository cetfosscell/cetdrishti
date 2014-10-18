<?php
	session_start();
	include_once("config.php");
	$uid = $_SESSION['ID'];
	$level = $_POST['level'];
	$clue = $_SESSION['clue'];
	$i=0;
	$var = mysql_query("SELECT clue FROM googly_questions WHERE level='$level'");
		$timevar = time()-$_SESSION['lvltime'];
	
		while($key = mysql_fetch_array($var)) {

		 $clarray = array();
 		 $clarray = explode("@", $key['clue']);
 		 if($clue==0&&$timevar<10){
 		 	$_SESSION['clue']=0;
 		 	echo "<b>First clue in 3 minutes.</b>";

 		 }
 		 else if($timevar>=180&&$timevar<=360){
 		   		 	echo "<b>CLUE 1:</b><br><b>".$clarray[0]."</b>";
 		   		 		echo "<br><b>Next clue in 3 minutes.</b>";
 		   		 	$_SESSION['clue']=1; 
 		 }
 		else if($timevar>360){
 		   		 	$_SESSION['clue']=2;
 		   		 	 	echo "<br><b>CLUE 1:</b><br><br><b>".$clarray[0]."</b><br>";
 		   		 	 	echo "<br><b>CLUE 2:</b><br><br><b>".$clarray[1]."</b><br><br>";
 		   		 	 	
 		 }		  					
			// if(mysql_query("UPDATE googly_status SET level = '$level', clue = '$_SESSION[\'clue \']' where playerId='$uid'")){			
			// }		
	}
?>