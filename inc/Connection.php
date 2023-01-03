<?php 
	$connection = mysqli_connect('localhost', 'root', '', 'chatdb');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	} else {
		echo "";
	}

	//time zone
	date_default_timezone_set('asia/colombo');
	
	$nowTime = date("Y-m-d H:i:s");

 ?>