<?PHP
	// This script will rebuild the entire recommender matrix
	
	// recommender setup - Amazon style
	mysqli_autocommit($connection, TRUE); // disable transactions temporarily
	mysqli_query($connection, 'DELETE FROM comp3018_matrix;');
	$i1 = mysqli_query($connection, 'SELECT moduleID from comp3018_modules;');
	
	while ($item1 = mysqli_fetch_array($i1)) { // foreach item, i1
		$u = mysqli_query($connection, 'SELECT studentID FROM comp3018_selections WHERE moduleID = "' . 
			$item1[0] . '";');
			
		while ($user = mysqli_fetch_array($u)) { // foreach user who bought item i1
			$i2 = mysqli_query($connection, 'SELECT moduleID FROM comp3018_selections ' . 
			'WHERE studentID = "' . $user[0] . '" AND moduleID <> "' . $item[0] . '";');
			
			while ($item2 = mysqli_fetch_array($i2)) { // foreach item2 that they also bought
				mysqli_query($connection, 'INSERT INTO comp3018_matrix VALUES ("' . 
					$user[0] . '", "' . $item1[0] . '", "' . $item2[0] . '");');
			}
		}
	}
?>