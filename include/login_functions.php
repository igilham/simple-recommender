<?php
	// Two utility functions to handle logging in and out of the system
	// Reference: Larry Ullman, Visual QuickPro Guide to PHP6 and MySQL5 for Dynamic Websites, Ch 12
	
	/* Determine the absolute url for use with the header() function
	 */
	function absolute_url ($page = 'index.php') {
		$url = 'http://' . $_SERVER['HTTP_HOST'] .dirname ($_SERVER['PHP_SELF']);
		$url = rtrim ($url, '/\\');
		$url .= '/' . $page;
		return $url;
	}
	
	function navigate ($page = 'index.php') {
		$url = absolute_url($page);
		header("Location: $url");
		exit();
	}
	
	/* Validates the form data of the log-in form
	 * returns true or false
	 */
	function validate_login ($connection, $uid = '') {
		$errors = array();
		
		if (empty ($uid))
			$errors[] = 'No user ID given.';
		else
			$user = mysqli_real_escape_string($connection, trim($uid));
		
		// remove illegal gunk
		$user = str_ireplace(';','',$user);
		$user = str_ireplace('--','',$user);
		$user = str_ireplace('DROP','',$user);
		$user = str_ireplace(')','',$user);
		$user = str_ireplace('"','',$user);
		$user = str_ireplace("'",'',$user);
		
		if (empty ($errors)) { // everything is ok
			$q = "SELECT studentID, studentName FROM comp3018_students WHERE studentID = '$user'";
			$r = mysqli_query ($connection, $q);
			
			if (mysqli_num_rows($r) == 1) {
				$row = mysqli_fetch_array ($r);
				return array(true, $row);
			}
			else { // not a match
				$errors[] = 'The specified user ID does not exist in the system';
			}
		}
		return array (false, $errors);
	} // end of function validate_login
?>
