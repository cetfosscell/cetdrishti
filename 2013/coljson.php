<?php require_once 'idi.php';
	session_start();
	//declare cat
	$cat = 0;
	// make the connection
	
	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	
 $college=ORM::for_table('college')->order_by_asc('CollegeId')->find_many(); 


$json = '[';
$first = true;

foreach($college as $row) {
  if (!$first) {
    $json .=  ',';
  } else {
    $first = false;
  }

  $json .= '{"value":"'.$row->CollegeName.'"}';
}

$json .= ']';

echo $json;

      
      ?>




	
	