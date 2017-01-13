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
	<title>Kobe, Japan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
echo "
	<form method ='POST' action='".getlogin($conn)."'>
		<input type='text' name='uid' placeholder = 'Username'>
		<input type='password' name='pwd' placeholder = 'Password'>
		<button type='submit' name='loginSubmit'>Login</button>
	</form>
	<form method ='POST' action='".userLogout()."'>
		<button type='submit' name='logoutSubmit'>Log out</button>
	</form>";

	if(isset($_SESSION['id'])){
		echo "You are logged in!";
	} else {
		echo "You are not logged in! <br>";
		?>
		<p>Click <a href = "signup.php">here</a> to sign up!<p>
		<?php
	}
?>

<p>Contact me <a href = "contactform.php">here!</a></p>
	<header>
		<h1> Welcome to Kobe! </h1>
		<nav>
<!-- 			<ul>
				<li><a href = "kobe.html">History of Kobe, Japan</a></li>
				<li><a href = "specialties-of-kobe.html"> Specialties of Kobe</a></li>
				<li><a href = "sports-teams-of-Kobe.html">Sports teams of Kobe</a></li>
			</ul> -->
		</nav>
	</header>
	<article>
		<p> My name is Nishant Teckchandani. I am a student studying BSc in Information Technology at Middlesex University. I was born in Kobe, Japan and I consider Kobe, Japan as my hometown. </p>

		<p>
		
		<img src="images/kobe-city-japan.jpg" width = 900 height = 400></p>

		<p>Kobe is the capital of the Hyogo prefecture. It is located on the southern side of the island of Honshu  and is thee capital of the Hyogo Prefecture. It is 19km away from Osaka and 520 km from Tokyo. Kobe is the sixth-largest city in Japan. The city is famous for its "Kobe beef" and "Arima Onsen" (hot springs). Kobe is the home to notable sports teams like the Orix Buffaloes (Baseball) and the Kobe Vissel (Football). Kobe has a vast and rich history,</p>

		<p><img src="images/kobe-beef.jpg" width = 900 height = 400></p>

		<p>Above is the famous "Kobe Beef" which a lot of foreigners come to Kobe for. Cows are hearded in special conditions to prepare this beef. The cows are fed beer and are massaged daily to ensure maximum flavour and tenderness. </p>

		<p><img src="images/orix.jpg" width = 400 height = 400>
		<img src="images/vissel-Kobe.png" width = 400 height = 400></p>

		<p>Above is the Orix baseball team logo (left) and the Vissel Kobe football team logo (right)</p>

	</article>
	<br><br>
<?php
	if(isset($_SESSION['id'])){
		echo "<form method ='POST' action='".setComments($conn)."'>
				<input type='hidden' name='uid' value='".$_SESSION['id']."'>
				<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>	
				<textarea name='message'></textarea><br>
				<button type='submit' name='commentSubmit'>Comment</button>
		</form>";
	} else {
		echo "You need to be logged in to comment!
		<br><br>";
	}

getComments($conn);
?>

<footer>
	<p> If you are interested in visiting Kobe, Click <a href = "flights.php">here</a> and we will email you details on flights and stays!  <br>
	Made by Nishant Teckchandani</p>
	
</footer>

</body>
</html>