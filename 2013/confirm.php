<style type="text/css">
body{
	background: rgb(129, 186, 16);
}
h2,a{
font-size: 55px;
text-align: center;
top: 45%;
position: relative;
color: #FFF;
	text-decoration: none;
	font-family:'Open Sans'
}
</style>
<h2>
<?php
	if(isset($_GET["check"])){
	$host="localhost"; // Host name 
	$username="cetdriss_pranav"; // Mysql username 
	$password="kindappan123"; // Mysql password 
	$db_name="cetdriss_drishti"; // Database name 
	$tbl_name="students"; // Table name

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	// get value of id that sent from address bar
	$id=$_GET["check"];

	// Retrieve data from database 
	$sql="SELECT * FROM $tbl_name WHERE valid='$id'";
	$result=mysql_query($sql);
	$rows=mysql_fetch_array($result);

	if($rows) {
		$email = $rows["email"];

	$sql="UPDATE $tbl_name SET valid='1' WHERE email='$email'";
	$result=mysql_query($sql);

	// if successfully updated. 
	if($result){
		echo "<script type=\"text/javascript\">alert(\"Success !\");window.location.href=\"http://cetdrishti.com/\"</script> ";
		
	}				
		
	}
}else{
	echo "Something is'nt good  here!! ";
}
?>
</h2>