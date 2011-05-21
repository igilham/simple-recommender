<?php
	// this page processes the login form submission 
	// and the request to reinitialise the database
	
	if (isset($_POST['submitted'])) {
		require_once('include/login_functions.php');
		require_once('include/mysql_connect.php');
		
		list($valid_user, $data) = validate_login($connection, $_POST['uid']);
		if ($valid_user) {
			session_start();
			$_SESSION['userid'] = $data['studentID'];
			$_SESSION['name'] = $data['studentName'];
			
			navigate ('selection.php');
		}
		else {
			$errors[] = $data;
		}
	}
	navigate('index.php');
?>