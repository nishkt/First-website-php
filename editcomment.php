<?php
	date_default_timezone_set('Indian/Mauritius');
	include 'dbh.inc.php';
	include 'comments.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="utf-8" />
	<title>Edit Comment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
$cid = $_POST['cid'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$message = $_POST['message'];

echo "<form method ='POST' action='".editComments($conn)."'>
			<input type='hidden' name='cid' value='".$cid."'>
			<input type='hidden' name='uid' value='".$uid."'>
			<input type='hidden' name='date' value='".$date."'>	
			<textarea name='message'>".$message."</textarea><br>
			<button type='submit' name='commentSubmit'>Edit</button>
</form>";

?>

</body>
</html>