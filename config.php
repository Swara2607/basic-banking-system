<?php
	$servername = "	sql304.epizy.com";
	$username = "epiz_27761035";
	$password = "pno90vLio9";
	$db = "epiz_27761035_my_db";

	$conn = mysqli_connect($servername, $username, $password, $db);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>