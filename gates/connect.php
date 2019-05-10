<?php

	//LOCALHOST
	// $host =  "localhost";
	// $user = "root";
	// $passwd = "";
	// $dbname = "medpmkk";
	// $charset =  "utf8";

	//LOCALHOST
	// $host =  "localhost";
	// $user = "medpmkcourse";
	// $passwd = "ducklab1701944";
	// $dbname = "medpmkcourse";
	// $charset =  "utf8";
	// DuckLabHost


	// // DDC.MOPHHost
		// $host =  "203.157.41.81";
		// $user = "root";
		// $passwd= "ddc015508";
		// $dbname = "ddc_dept";
		// $charset =  "utf8";

	$host =  "localhost";
	$user = "ducklabc_ddc";
	$passwd= "duck170lab19";
	$dbname = "ducklabc_ddc";
	$charset =  "utf8";



	$conn = mysqli_connect($host, $user, $passwd ,$dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_set_charset($conn,"utf8");

 
?>
