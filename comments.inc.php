<?php

function signUp($conn){
	if(isset($_POST['signupSubmit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];
		$email = $_POST['email'];

		$sql= "INSERT INTO user (uid, pwd, fname, lname, email) VALUES ('$uid', '$pwd', '$fname', '$lname', '$email')";
		$result = $conn->query($sql); 

		header("Location: mainpage.php");
	}
}

function setComments($conn){
	if(isset($_POST['commentSubmit'])){
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO commentstab (uid, date, message) VALUES ('$uid', '$date', '$message')";
		$result = $conn->query($sql);
	}
}

function getComments($conn){
	$sql = "SELECT * FROM commentstab";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$id = $row['uid'];
		$sql2 = "SELECT * FROM user WHERE id='$id' ";
		$result2 = $conn->query($sql2);
		if($row2 = $result2->fetch_assoc()){
			echo "<div class = 'comment-box'><p>";
			echo $row2['uid']. "<br>";
			echo $row['date']. "<br>";
			echo nl2br($row['message']);//nl2br is used for line break in sql message data
			echo "</p>";
			if(isset($_SESSION['id'])){
				if($_SESSION['id'] == $row2['id']){
					echo 	
					"<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button type = 'submit' name='commentDelete'>Delete</button>
					</form>
					
					<form class='edit-form' method='POST' action='editcomment.php'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<input type='hidden' name='uid' value='".$row['uid']."'>
						<input type='hidden' name='date' value='".$row['date']."'>
						<input type='hidden' name='message' value='".$row['message']."'>
						<button>Edit</button>
					</form>";
				} 
/*				else {
					echo 	"<form class='edit-form' method='POST' action='replycomment.php'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button type = 'submit' name='commentreply'>Reply</button>
					</form>";


				}*/
			} /*else {
				echo "<p class = 'unloggedinMessage'>You need to be logged in to edit or delete comments!</p>";
			}*/
			echo "</div>";

		}
	}
}

function editComments($conn){
	if(isset($_POST['commentSubmit'])){
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "UPDATE commentstab SET message='$message' WHERE cid='$cid' ";//this will update the message column in the database to edits we do on the website under the correct CID (comment id)
		$result = $conn->query($sql);
		header("Location: mainpage.php");
	}
}

function replyComments($conn){
	if(isset($_POST['replySubmit'])){
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO commentstab (uid, date, message) VALUES ('$uid', '$date', '$message')";//this will reply the message column in the database to edits we do on the website under the correct CID (comment id)
		$result = $conn->query($sql);
		header("Location: mainpage.php");
	}
}

function deleteComments($conn) {
	if(isset($_POST['commentDelete'])){
		$cid = $_POST['cid'];

		$sql = "DELETE FROM commentstab WHERE cid='$cid' ";//this will update the message column in the database to edits we do on the website under the correct CID (comment id)
		$result = $conn->query($sql);
		header("Location: mainpage.php");
	}

}

function getlogin($conn){
	if(isset($_POST['loginSubmit'])){
		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd' ";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0){
			if($row = $result->fetch_assoc()){
				$_SESSION['id'] = $row['id'];
				$_SESSION['uid'] = $row['uid'];
				header("Location: mainpage.php?loginsuccess");
				exit();
			}
		} else {
				header("Location: mainpage.php?loginfailed");
				exit();
		}
	}
}

function userLogout(){
	if(isset($_POST['logoutSubmit'])){
		session_start();
		session_destroy();
		header("Location: mainpage.php");
		exit();
	}
}

function flights($conn){
	if(isset($_POST['flightSubmit'])){
		$email = $_POST['email'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];

		$sql= "INSERT INTO flights (email, startdate, enddate) VALUES ('$email', '$startdate' , '$enddate')";
		$result = $conn->query($sql); 

		header("Location: mainpage.php");
	}
}

function contact($conn){
	if(isset($_POST['contactSubmit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$sql= "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
		$result = $conn->query($sql); 

		header("Location: mainpage.php");
	}
}
