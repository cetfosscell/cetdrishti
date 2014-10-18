<?php 
	session_start();
	if(isset($_SESSION['email_drs'])&&isset($_SESSION['id']))
	{
		unset($_SESSION['email_drs']);
		unset($_SESSION['id']);
	}
	header('Location: index.php');
	 

?>