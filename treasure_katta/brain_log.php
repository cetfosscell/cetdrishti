<?php
$host = 'localhost';
$name = 'cetdriss_pranav';
$pass = 'kindappan123';
$db = 'cetdriss_treasure';
mysql_connect($host,$name,$pass) or die('Could not connect');
mysql_select_db($db) or die(mysql_error());

$query= "DELETE FROM log";
$result=mysql_query($query) or die(mysql_error());
$num=mysql_num_fields($result) or die(mysql_error());
?>
