<?php
	$host = 'localhost';
	$user = 'root';
	$passwd = 'nishant';//change password depending on password of MySQL on the system
	$database = 'commentdb';
	$tblname = 'commentstab';

/*used to connect to comments table in comment database*/

$conn = mysqli_connect($host, $user, $passwd, $database);

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
