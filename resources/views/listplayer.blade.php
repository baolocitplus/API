<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
	$url ="http://”.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']"; // đường dẫn đến JSON file 
	$data = file_get_contents($url); // lấy nội dung và gán vào biến data 
	$characters = json_decode($data); // giải mã JSON feed 
	echo $characters[0]->email;
	 
	foreach ($characters as $character) {
	    echo $character->email . '';
	}
	?>
</body>
</html>