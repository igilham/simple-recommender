<?php 
	
	include('include/header.php');
	
	if (!empty ($errors)) {
		echo "<h2>Errors</h2>\n" .
		'<p class="error">The following errors occurred:</p>' .
		"\n<ul>\n";
		foreach ($errors as $message) {
			echo "<li>$message</li>\n";
		}
		echo "</ul>\n<p>Please try again.</p>";
	}
?>
	<h2>Login</h2>
	
	<form action="login.php" method="post">
		<p>User ID: <input type="text" name="uid" maxlength="20"></p>
		<p><input type="submit" value="Log in" name="submit"></p>
		<p><input type="hidden" name="submitted" value="TRUE"></p>
	</form>
	<form action="db_init.php" method="post">
		<p><input type="submit" value="Re-initialise database" name="init"></p>
		<p><input type="hidden" name="reinit" value="TRUE"></p>
	</form>
	
<?php include ('include/footer.php'); ?>