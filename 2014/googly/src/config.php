<?php
include_once("idiorm.php");
########## MySql details (Replace with yours) #############
$username = "cetdriss_pranav"; //mysql username
$password = "kindappan123"; //mysql password
$hostname = "localhost"; //hostname
$databasename = "cetdriss_treasure"; //databasename

$connecDB = mysql_connect($hostname, $username, $password)or die('could not connect to database');
mysql_select_db($databasename,$connecDB);
ORM::configure('mysql:host=localhost;dbname=cetdriss_treasure');
ORM::configure('username', 'cetdriss_pranav');
ORM::configure('password', 'kindappan123');
ORM::configure('id_column_overrides', array(
    'googly_players' => 'userId',
    'googly_questions' => 'level',
    'googly_answer' =>'level',
    'anslog' =>'no#',
    'googly_status' =>'playerId'
));
ORM::configure('return_result_sets', true);
?>