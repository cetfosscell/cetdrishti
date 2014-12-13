<?php
	session_start();
	include_once('config.php');
	
	$uname = $_POST['user'];
	$pass= $_POST['pass'];
	$result = mysql_query("SELECT userId,userName,password FROM googly_players where userName = '$uname' ");
	if(mysql_num_rows($result) > 0){
	 while($key = mysql_fetch_array($result)){
	 	if($uname === $key['userName']&&$pass === $key['password']){
	 			$_SESSION['ID']=$key['userId'];
	 			$_SESSION['uname']=$uname;
	 			$_SESSION['loggedin']=true;
	 			if($_SESSION['ID']==1000){
	 				echo "Admin";
	 			}
	 			else{
	 			echo "Success";
	 		}
	 		}
	 		else{
	 			echo "<em>Invalid Username Password combination.<em>";
	 	}
	 }
	}
	else {
		echo "<em>Invalid Username.";
	}
?>	