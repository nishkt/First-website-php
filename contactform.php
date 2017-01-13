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
	<title>Contact Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php
	echo "
		<form method ='POST' action='".contact($conn)."'>
			NAME: <input type='text' name='name' placeholder='Name' required><br>
			EMAIL:<input type='email' name='email' placeholder='Email' required><br>
			MESSAGE:<br>
			<TEXTAREA name='message' placeholder = 'Your message' required rows='20' cols='80'></textarea><br>
			<button type='submit' name = 'contactSubmit'>SEND EMAIL</button><br>
		</form>";
	?>
</body>
</html>
