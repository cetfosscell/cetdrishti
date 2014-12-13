<title>Registration</title>
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
}
</style>
<a href="index.php" ><h2>
<?php
require 'idi.php';

if(isset($_SESSION['email']))
	header('Location: index.php');
ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
ORM::configure('username', 'cetdriss_pranav');
ORM::configure('password', 'kindappan123');

if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['pass1'])&&isset($_POST['pass2'])&&isset($_POST['phone'])) {


	$name = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['name']));
	$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['email']));
	$pass1 = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['pass1']));
	$pass2 = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['pass2']));
	$phone = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['phone']));
	$college = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['college']));
	$accomodation = str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['accomodation']));

	if($name!=null && $email!=null && $phone!=null && $pass1!=null && $pass2!=null) {
		if($pass1 == $pass2) {
			$pass=md5($pass1);			

			$result=ORM::for_table('students')->where('email',$email)->find_one();
			$resultph=ORM::for_table('students')->where('phone',$phone)->find_one();
			if($result||$resultph){
				echo $email." or ".$phone." already registered ";
			}else{
			
			$check=md5($email).md5($name);

			$person = ORM::for_table('students')->create();

			$person->name = $name;
			$person->password = $pass;
			$person->college = $college;
			$person->email = $email;
			$person->phone = $phone;
			$person->accomodation = $accomodation;
			$person->phone2 = 0;
			$person->valid = $check;
			$person->reg_bit = 0;
			$person->pay_bit = 0;


			$person->save();

				echo "Success";
						$to=$email;
						$subject="Confirm your Mail";
						$message=<<<EOD
						Welcome <b> $name </b>, <br>
						You have registered in Drishti. <br>
						Name  : $name <br>
						Phone : $phone<br>
						Pass  : $pass1<br>
						Email : $email<br>
						Please Confirm Your mail with this link :) 
						<a href="http://cetdrishti.com/confirm.php?check=$check">Click Here</a>
EOD;
					$header = "MIME-Version: 1.0 \r\n";
					$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
					$header .= "From:noreply@cetdrishti.com \r\n";
					$send_mail = mail ($to,$subject,$message,$header);
					echo "<script type=\"text/javascript\">alert(\"Check Your Mail\")</script> ";

				}
			}
			else
				echo "Password dont match ";			
		}	
		else {
		echo "All fields Required";
	}
	}
	else {
		echo "All fields Required";
	}

?>

</h2></a>