<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("example.xls");
?>
<html>
<head>

</head>

<body>
<?php 
for ($i=0; $i < 200; $i++) { 
	echo $data->val($i,'D')."<br>";
}



 ?>
</body>
</html>
