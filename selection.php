<?php
	include('include/header.php');
	
	// Selection page
	session_start();
	if(!isset($_SESSION['userid'])) {
		require_once('include/login_functions.php');
		navigate(); // return to index
	}
	
	$userid = $_SESSION['userid'];

	require_once('include/mysql_connect.php'); 
	echo "<h2>Welcome to the system</h2>\n";
	echo '<p>' . $_SESSION['name'] . ' signed in (' .
		'<a href="logout.php">Log out</a>)</p>';
	
	if (isset ($_GET['e'])) {
		$error = $_GET['e'];
		switch ($error){
			case 'number':
				echo '<div class="error"><p>Too many options selected.</p></div>';
				break;
			case'ok':
				echo '<div class="success"><p>Changes made successfully.</p></div>';
				break;
			default:
				break;
		}
	}
		
	echo '<h3>Choose/Change Options</h3>';
	echo '<p>Choose your options below. Recommendations are in ' .
		'<strong>bold</strong> and numbered such that number "1" is ' . 
		'the top recommendation, "2" the second, etc.</p>';
	
	/////////
	//******* implementation of the recommender system
	/////////
	require_once('include/recommender_functions.php');
	
	///////// Selection form below
		
	$r = mysqli_query($connection, 'SELECT * FROM comp3018_modules;');
	if($r) {
		echo '<form action="choose_new.php" method="post">' . "<table>\n";
		
		while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
			$selected = false;
			$recommended = 0;
			
			// is the current module selected already?
			foreach ($current as $item ) {
				if ($item == $row['moduleID']) {
					$selected = true;
				}
			}
			// is the current module recommended?
			foreach ($recommendations as $key => $value ) {
				if ($key == $row['moduleID']) {
					$recommended = $recommendations[$key];
				}
			}			
			
			echo '<tr';
			if($recommended != 0)
				echo ' class="recommended"';
			echo '>' .
				'<td><input type="checkbox" name="' . $row['moduleID'] . 
				'" value="' . $row['moduleID'] . '"';
				if ($selected == true) {
					// note possible html standards compliance issue, but works in tested browsers
					echo ' checked="true"';
				}
				echo '>' .'</td>' .
				'<td>' . $row['moduleID'] . '</td>' .
				'<td>' . $row['title'];
				if ($recommended != 0) {
					echo '   -   Recommendation: ' . $recommended;
				}
				echo '</td>' .
				'<td><a href="' . $row['homepage'] . '">homepage</a>' . '</td>' .
				"</tr>\n";
		}
		echo "</table>" . '<p><input type="submit" value="Submit"></p></form>' . "\n";
	}
	
	////////////// end of options selection form
	
	echo '<p><a href="logout.php">Log out</a></p>';
	
	mysqli_close($connection);
	
	
	include('include/footer.php');
?>