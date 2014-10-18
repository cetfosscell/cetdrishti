<?php
	session_start();
	include_once("config.php");
	
	$uid = $_SESSION['ID'];
	$uname = $_SESSION['uname'];
	$ans_temp = $_POST['answer'] ;
	$level = $_POST['level'];
	$var = mysql_query("SELECT answer FROM googly_answer WHERE level='$level'");
	while($key = mysql_fetch_array($var)) {
		mysql_query("INSERT INTO anslog (userName,level,answer,time) VALUES ('$uname','$level','$ans_temp',CURRENT_TIMESTAMP)");
		if($ans_temp === $key['answer']){
			if($level==10){
				$_SESSION['done']=true;
				$_SESSION['lvl']++;
				$lvltmp = $_SESSION['lvl'];
				$_SESSION['clue'] = 0;
				if(mysql_query("UPDATE googly_players SET currentLevel = '$lvltmp' where userId='$uid'")){
				 mysql_query("UPDATE googly_players SET time = now() where userId='$uid'");
				 mysql_query("UPDATE googly_status SET level='$lvltmp',played = 1 where userId='$uid'");

				
				echo "<em>Congrats !!You have done it.</em>";
			}
			}
			else{
			$_SESSION['lvl']++;
			$lvltmp = $_SESSION['lvl'];
			$_SESSION['clue'] = 0;
			if(mysql_query("UPDATE googly_players SET currentLevel = '$lvltmp' where userId='$uid'")){
				 mysql_query("UPDATE googly_players SET time = now() where userId='$uid'");
				 $_SESSION['lvltime']=time();

				echo "<em>That is Correct!!</em>";
			}
 		}
 		  $res =  ORM::for_table('googly_status')->find_one($uid);
				 if($res !=false ){
				 $res->level=$_SESSION['lvl'];
				 $res->set_expr('time', 'NOW()'); 
				 $res->save();
				}
		}
		else{
			echo "<em>Sorry,incorrect Answer.Try again.</em>";
		}
	}
?>