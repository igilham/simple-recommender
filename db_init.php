<?php
	// reinitialises the database;
	//
	
	// confirm form submission
	require_once('include/login_functions.php');
	if (!isset($_POST['reinit'])) {
		navigate(); // to index
	}

	require_once('include/mysql_connect.php');
	
	// setup transaction
	mysqli_autocommit($connection, FALSE);
	
	// drop tables
	mysqli_query($connection, 'USE db_ig405;'); 
	mysqli_query($connection, 'DROP TABLE comp3018_students;');
	mysqli_query($connection, 'DROP TABLE comp3018_modules;');
	mysqli_query($connection, 'DROP TABLE comp3018_selections;');
	mysqli_query($connection, 'DROP TABLE comp3018_matrix;');
	
	//rebuild tables
	mysqli_query($connection, 'CREATE TABLE comp3018_students(
		studentID VARCHAR(20) NOT NULL,
		studentName VARCHAR(45) NOT NULL,
		PRIMARY KEY (studentID)
	);');

	mysqli_query($connection, 'CREATE TABLE comp3018_modules(
		moduleID VARCHAR(16) NOT NULL,
		title VARCHAR(100) NOT NULL,
		homepage VARCHAR(100),
		PRIMARY KEY (moduleID)
	);');

	mysqli_query($connection, 'CREATE TABLE comp3018_selections(
		studentID VARCHAR(20) NOT NULL,
		moduleID VARCHAR(16) NOT NULL
	);');
	
	mysqli_query($connection, 'CREATE TABLE comp3018_matrix(
		studentID VARCHAR(20) NOT NULL,
		moduleID1 VARCHAR(16) NOT NULL,
		moduleID2 VARCHAR(16) NOT NULL
	);');


	// create users
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("ig405", "Ian Gilham");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("jd106", "John Doe");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("jd206", "Jane Doe");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("cd306", "Charles Dickens");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("aa106", "Anon Anonymous");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("je206", "Jane Eyre");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("mdc105", "Miguel de Cervantes");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("dq506", "Don Quixote");');
	mysqli_query($connection, 'INSERT INTO comp3018_students VALUES ("ws105", "William Shakespeare");');

	
	// create modules
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3001", "Scripting Languages", "https://secure.ecs.soton.ac.uk/module/0910/comp3001");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3002", "The IT Profession", "https://secure.ecs.soton.ac.uk/module/0910/comp3002");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3004", "Principles of Computer Graphics", "https://secure.ecs.soton.ac.uk/module/0910/comp3004");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3005", "Computer Vision", "https://secure.ecs.soton.ac.uk/module/comp300/comp3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3006", "Real-time Computing and Embedded Systems", "https://secure.ecs.soton.ac.uk/module/comp3006");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3008", "Machine Learning", "https://secure.ecs.soton.ac.uk/module/comp3008");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3009", "Software Quality Assurance and Project Management", "https://secure.ecs.soton.ac.uk/module/comp3009");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3010", "Advanced Computer Networks", "https://secure.ecs.soton.ac.uk/module/comp3010");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3011", "Critical Systems", "https://secure.ecs.soton.ac.uk/module/comp3011");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3013", "Multimedia Systems", "https://secure.ecs.soton.ac.uk/module/comp3013");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3016", "Hypertext and Web Technologies", "https://secure.ecs.soton.ac.uk/module/comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3017", "Advanced Databases", "https://secure.ecs.soton.ac.uk/module/comp3017");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3018", "E-Business Techniques", "https://secure.ecs.soton.ac.uk/module/comp3018");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3019", "Large Scale Distributed Systems", "https://secure.ecs.soton.ac.uk/module/comp3019");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3020", "Part III Project", "https://secure.ecs.soton.ac.uk/module/comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3028", "Knowledge Technologies", "https://secure.ecs.soton.ac.uk/module/comp3028");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("comp3032", "Intelligent Algorithms", "https://secure.ecs.soton.ac.uk/module/comp3032");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("info3002", "Knowledge, Informationa and Society", "https://secure.ecs.soton.ac.uk/module/info3002");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("info3003", "Industrial and Commercial Systems", "https://secure.ecs.soton.ac.uk/module/info3003");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("info3004", "eLearning and Learning Technology", "https://secure.ecs.soton.ac.uk/module/info3004");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("info3005", "IT Security", "https://secure.ecs.soton.ac.uk/module/info3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("span9044", "Spanish for Engineers", "https://secure.ecs.soton.ac.uk/module/span9044");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("fren9044", "French for Engineers", "https://secure.ecs.soton.ac.uk/module/fren9044");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("germ9034", "German for Engineers", "https://secure.ecs.soton.ac.uk/module/germ9034");');
	mysqli_query($connection, 'INSERT INTO comp3018_modules VALUES ("langxxxx", "Other Language for Engineers", "https://secure.ecs.soton.ac.uk/module/langxxxx");');
	
	// create selections
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "info3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "comp3001");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "comp3018");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ig405", "span9044");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3017");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3013");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3004");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd106", "comp3005");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "langxxxx");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "comp3019");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "comp3008");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("jd206", "info3005");');
	
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "info3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "comp3017");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "comp3018");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("cd306", "comp3013");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "comp3001");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "comp3008");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "comp3013");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "comp3017");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("aa106", "info3004");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3001");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3032");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3009");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3004");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("je206", "comp3006");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3028");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3009");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3004");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3006");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("mdc105", "comp3001");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "comp3001");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "germ9034");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "info3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "comp3018");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("dq506", "comp3016");');

	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "info3005");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "comp3020");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "fren9044");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "comp3016");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "comp3018");');
	mysqli_query($connection, 'INSERT INTO comp3018_selections VALUES ("ws105", "comp3017");');
	
	mysqli_commit($connection);
	
	require_once('include/matrix_rebuild.php');
		
	mysqli_close($connection);
	navigate(); // to index
?>