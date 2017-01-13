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
	<title>Flights Query</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<?php
	echo "
		<form method ='POST' action='".flights($conn)."'>
			<input type='text' name='email' placeholder='Email'><br>
			<input type='date' name='startdate' placeholder='Arriving date' required><br>
			<input type='date' name='enddate' placeholder='Departing date'><br>
			<button type='submit' name = 'flightSubmit'>SEND ME FLIGHT INFORMATION</button><br>
		</form>";
	?>
</body>
</html>


