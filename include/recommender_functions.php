<?PHP
	// This script gets the currently selected modules and makes appropriate 
	// recommendations based on a frequency-of-selection model.
	// It is implemented as a simple imperative program.
	
	////////////// Get current selections
	
	// Gets the currently modules and places them in the $current[] array
	
	$q1 = "SELECT moduleID " .
		"FROM comp3018_selections  " .
		"WHERE studentID = '" . $_SESSION['userid'] . "'" .
		"ORDER BY moduleID;";
	$res = mysqli_query($connection, $q1);
	$current = array();
	while ($c = mysqli_fetch_array ($res, MYSQLI_ASSOC)) {
		array_push($current, $c['moduleID']);
	}
	unset($q1, $res, $c); // cleanup
	
	////////////// end of get curretn selections - use $current[]
	
	////////////// start of recommendation algorithm
	
	$recommendations = array();
	$q = 'SELECT moduleID2, COUNT(moduleID2) FROM comp3018_matrix ';
	
	// Add inclusive where clauses for moduleID1
	if (isset ($current[0])) {
		$i = 0;
		while (isset ($current[$i])) {
			if ($i == 0)
				$q .= ' WHERE (';
			else
				$q .= ' OR ';
			$q .= 'moduleID1 = "' . $current[$i] . '"'; 
			$i++;
		}
		$q .= ')';
	}
	
	// Add exclusive where clauses for moduleID2
	if (isset ($current[0])) {
		$i = 0;	
		while (isset ($current[$i])) {
			if ($i == 0)
				$q .= ' AND (';
			else
				$q .= ' AND ';
			$q .= 'moduleID2 <> "' . $current[$i] . '"'; 
			$i++;
		}
		$q .= ')';
	}
	
	// group and ordering rules
	$q .= ' GROUP BY moduleID2 ORDER BY COUNT(moduleID2) DESC LIMIT 5;';
	
	// echo "<p>DEBUG - query = " . $q . "</p>";
	
	$i = 1;
	$r = mysqli_query($connection, $q);
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		//array_push($recommendations, $row['moduleID2']);
		$recommendations[$row['moduleID2']] = $i;
		$i++;
	}
	
	unset($q, $row, $r, $i); // cleanup
	
	//////////////  end of recommendation algorithm - use $recommendations[]
	
?>