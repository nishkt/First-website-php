<?php
	date_default_timezone_set('Indian/Mauritius');
	include 'dbh.inc.php';
	include 'comments.inc.php';
	session_start(); /*starts a session*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="utf-8" />
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php
	echo "
		<form method ='POST' action='".signUp($conn)."'>
			<input type='text' name='fname' placeholder='Firstname'><br>
			<input type='text' name='lname' placeholder='Lastname'><br>
			<input type='text' name='uid' placeholder='Username' required><br>
			<input type='password' name='pwd' placeholder='Password' required><br>
			<input type='text' name='email' placeholder='Email'><br>
			<button type='submit' name = 'signupSubmit'>SIGN UP</button><br>
		</form>";
	?>
</body>
</html>


