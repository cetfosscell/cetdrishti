<?php
	include_once('config.php');
	$action = $_GET['required'];
	if($action==="answer"){
		$result = ORM::for_table('anslog')->order_by_desc('time')->find_result_set();
		echo "<table border=\"1\" id=\"table1\" width = 500px >
    			<th>UserName</th>
    			<th>Level</th>
   				<th>Answer</th>
    			<th>Time </th>";
		foreach($result as $record) {
    		echo "<tr>",
     			"<td>".$record->userName."</td>",
     			"<td>".$record->level."</td>",
     			"<td>".$record->answer."</td>",
     			"<td>".$record->time."</td>",
   				"</tr>";
		}
		echo "</table>";
	}
	else if($action==="status"){
		$result = ORM::for_table('googly_status')->raw_query('SELECT * FROM (SELECT playerId,level,(UNIX_TIMESTAMP(time)-UNIX_TIMESTAMP(start_time)) as total FROM googly_status) as t  order by level desc,total asc')->find_result_set();
		echo "<table border=\"1\" id=\"table1\" width = 500px >
    			<th>UserId</th>
    			<th>Level</th>
    			<th>Total Time </th>";
		foreach($result as $record) {
			$time = $record->total;
			$secs = $time%60;
			$mins=floor($time/60);
    		echo "<tr>",
     			"<td>".$record->playerId."</td>",
     			"<td>".$record->level."</td>",
     			"<td>".$mins." : ".$secs."</td>",
   				"</tr>";
		}
		echo "</table>";
	}
	else if($action === "clear"){
		$person = ORM::for_table('anslog')->delete_many();
		echo "Log Cleared!!";
	}
?>