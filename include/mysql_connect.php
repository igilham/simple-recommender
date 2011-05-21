<?php
	// contains all information needed to connect to the database, 
	// and establishes the connection
	// 
	// Beware of security exploits if this file becomes readable
	
	DEFINE ('DB_HOST', 'linuxproj.ecs.soton.ac.uk');
	DEFINE ('DB_NAME', 'db_ig405');
	DEFINE ('DB_USER', 'ig405');
	DEFINE ('DB_PASS', 'Gingerfist');
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die 
		('Could not connect to MySQL: ' . mysqli_connect_error());
	
?>