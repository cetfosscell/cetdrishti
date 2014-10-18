<?php
session_start();
if(isset($_SESSION['email']))
	if($_SESSION['email']==null)	
	header('Location: index.php');
require 'idi.php';
ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
ORM::configure('username', 'cetdriss_pranav');
ORM::configure('password', 'kindappan123');

if(isset($_POST['email'])&&isset($_POST['pass']))
	if(!empty($_POST['email'])&&!empty($_POST['pass'])) {
	
	//$check = $_GET["check"];

	$result=ORM::for_table('students')->where('email',$_POST['email'])->where('password',md5($_POST['pass']))->where('valid',1)->find_one();

	if ($result) {
		$_SESSION['user_name']=$result->name;
		$_SESSION['email_drs']=$result->email;
		$_SESSION['id']=$result->drishti_id;
		
		echo "chill";
	}
	else {
				echo "error";
	}

}
?>