<?php
session_start();
$json = $_POST["json"];
if(!$json) 
{
  echo("You didn't select any events");
} 
else
{
	require('connect.inc.php');
 /* $con=mysqli_connect("localhost","cetdriss_pranav","kindappan123","cetdriss_drishti");
// Check connection
	
 /* if (mysqli_connect_errno())
  {
    echo "error";
  }*/
 $jss=$json;

	$query="DELETE FROM event_reg WHERE drs_id=".$_SESSION['id'].""	;
	$result=mysql_query($query) or die(mysql_error());
		if($result) {
				foreach($jss as $row)
				{
						$q2="INSERT INTO event_reg (eve_id,drs_id) VALUES (".$row.",".$_SESSION['id'].")";
						$r2=mysql_query($q2) or die(mysql_error());				
				}
		}

  mysql_query(sprintf("UPDATE students SET eves='%s'
    WHERE email='%s'",json_encode($json),$_SESSION['email_drs'] ));
/*	mysqli_close($con);
*/
  echo "Successfully Registered !";
	
}

?>