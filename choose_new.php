<?php
	session_start();
	require_once('include/login_functions.php');
	
	if (!isset ($_SESSION['userid'])) {
		navigate(); // return to index
	}
	
	require_once('include/mysql_connect.php');
	
	$selections = array();
	foreach ($_POST as $key => $value) {
		if ($value == true) {
			$selections[$key] = $value;
		}
	}
	unset($value);
	

	if (count ($selections) > 6) { // too many options selected
		navigate('selection.php?e=number');
	}


	mysqli_autocommit($connection, FALSE);
	mysqli_query($connection, 'DELETE FROM comp3018_selections WHERE studentID = "' . $_SESSION['userid'] . '";');
	
	foreach ($selections as $key => $value) {
		// database update
		mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("' . $_SESSION['userid'] . '", "' . $key . '");');
	}
	mysqli_commit($connection);
	
	require_once('include/matrix_rebuild.php');
	
	mysqli_close($connection);
	
	navigate('selection.php?e=ok');
?>