<?php
	// logs the user out, destroys the session and redirects to the home page
	// Reference: PHP.net session destroy manual
	
	require_once('include/login_functions.php');
	session_start();
	// delete variables
	$_SESSION = array ();
	
	// delete session cookie
	if (isset ($_COOKIE [session_name ()])) {
	    setcookie(session_name (), '', time ()-42000, '/');
	}
	// tear down session
	session_destroy ();
	
	navigate ('index.php');
?>