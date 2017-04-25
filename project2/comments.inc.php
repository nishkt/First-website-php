<?php

ob_start();

function signUp($conn){
	if(isset($_POST['signupSubmit'])){
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);

		//created prepared statement no.1
		//check to see if username has been take or not
		$stmt = $conn->prepare("SELECT uid FROM user WHERE uid = ?");
		$stmt->bind_param("s", $username);

		$username = $uid;
		$stmt->execute();
		$result = $stmt->get_result();
		$uidcheck = $result->num_rows;

		if($uidcheck > 0){
			header("Location: ../project2/signup.php?error=username");
			exit();
		}else{
			//hashing password
			$hash_password = password_hash($pwd, PASSWORD_DEFAULT);

			//prepared statement for signing up no.2
			$stmt = $conn->prepare("INSERT INTO user (uid, pwd, fname, lname, email) VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("sssss", $username, $password, $firstname, $lastname, $mail);

			$username = $uid;
			$password = $hash_password;
			$firstname = $fname;
			$lastname = $lname;
			$mail = $email;
			$stmt->execute();

			$result = $stmt->get_result();

			header("Location: mainpage.php");
		}
	}
}

function setComments($conn){
	if(isset($_POST['commentSubmit'])){
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		//created prepared statement
		$stmt = $conn->prepare("INSERT INTO commentstab (uid, date, message) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $username, $dt, $msg);

		$username = $uid;
		$dt = $date;
		$msg = $message;

		$stmt->execute();
		$result = $stmt->get_result();
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
			echo "<h4>". $row2['uid']. "<br>";
			echo "<h6>". $row['date']. "</h6>". "</h4>". "<br>";
			echo nl2br($row['message']);//nl2br is used for line break in sql message data
			echo "</p>";
			if(isset($_SESSION['id'])){
				if($_SESSION['id'] == $row2['id']){
					echo 	
					"<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<button class = 'btn btn-warning btn-lg' type = 'submit' name='commentDelete'>Delete</button>
					</form>
					
					<form class='edit-form' method='POST' action='editcomment.php'>
						<input type='hidden' name='cid' value='".$row['cid']."'>
						<input type='hidden' name='uid' value='".$row['uid']."'>
						<input type='hidden' name='date' value='".$row['date']."'>
						<input type='hidden' name='message' value='".$row['message']."'>
						<button class = 'btn btn-warning btn-lg'>Edit</button>
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
		$cid = mysqli_real_escape_string($conn, $_POST['cid']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		//create prepared statements
		$stmt = $conn->prepare("UPDATE commentstab SET message='$message' WHERE cid=?");
		$stmt->bind_param("s", $commentid);

		$commentid = $cid;
		$stmt->execute();
		$result = $stmt->get_result();

/*		$sql = "UPDATE commentstab SET message='$message' WHERE cid='$cid' ";//this will update the message column in the database to edits we do on the website under the correct CID (comment id)
		$result = $conn->query($sql);*/
		header("Location: mainpage.php");
	}
}

function deleteComments($conn) {
	if(isset($_POST['commentDelete'])){
		$cid = mysqli_real_escape_string($conn, $_POST['cid']);

		//create prepared statements
		$stmt = $conn->prepare("DELETE FROM commentstab WHERE cid=? ");
		$stmt->bind_param("s", $commentid);

		$commentid = $cid;
		$stmt->execute();
		$result = $stmt->get_result();


/*		$sql = "DELETE FROM commentstab WHERE cid='$cid' ";//this will update the message column in the database to edits we do on the website under the correct CID (comment id)
		$result = $conn->query($sql);*/
		header("Location: mainpage.php");
	}

}

function getlogin($conn){
	if(isset($_POST['loginSubmit'])){
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		$sql = "SELECT * from user WHERE uid='$uid'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$hash_pwd = $row['pwd'];
		$hash = password_verify($pwd, $hash_pwd);

		if($hash == 0){
			header("Location: wrongPassword.php");
			exit();
		} else {
			$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hash_pwd'";
			$result = $conn->query($sql);
			if($row = $result->fetch_assoc()){
				$_SESSION['id'] = $row['id'];
				$_SESSION['uid'] = $row['uid'];
				header("Location: mainpage.php?loginsuccess");
				exit();
			} else {
				header("Location: wrongPassword.php");
				exit();
				
			}
		}

/*			//create prepared statements
			$stmt = $conn->prepare("SELECT * FROM user WHERE uid=? AND pwd=?");
			$stmt ->bind_param("ss", $username, $password);

			$username = $uid;
			$password = $pwd;
			$stmt->execute();

			$result = $stmt->get_result();

			$rowNum = $result->num_rows;


			//prepared statements over

			/*$result = mysqli_query($conn, $sql);*/
/*			if($rowNum > 0){
				if($rowNum = $result->fetch_assoc()){
					$_SESSION['id'] = $row['id'];
					$_SESSION['uid'] = $row['uid'];
					header("Location: mainpage.php?loginsuccess");
					exit();
				}
			} else {
					header("Location: wrongPassword.php");
					exit();
			}*/

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
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
		$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);

		//create prepared statements
		$stmt = $conn->prepare("INSERT INTO flights (email, startdate, enddate) VALUES (?,?,?)");
		$stmt->bind_param("sss", $mail, $sdate, $edate);

		$mail = $email;
		$sdate = $startdate;
		$edate = $enddate;
		$stmt->execute();

		$result = $stmt->get_result();

		/*$sql= "INSERT INTO flights (email, startdate, enddate) VALUES ('$email', '$startdate' , '$enddate')";
		$result = $conn->query($sql); */

		header("Location: mainpage.php");
	}
}

function contact($conn){
	if(isset($_POST['contactSubmit'])){
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		//create prepared statement
		$stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?,?,?)");
		$stmt->bind_param("sss", $nom, $mail, $msg);

		$nom = $name;
		$mail = $email;
		$msg = $message;
		$stmt->execute();

		$result = $stmt->get_result();

/*		$sql= "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
		$result = $conn->query($sql); */

		header("Location: mainpage.php");
	}
}
