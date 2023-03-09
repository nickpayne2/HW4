<?php

$page_roles=array('admin');
require_once  'checksession.php';
?>

<html>
	<head></head>
	
	<body>
	<h1> Add a new User</h1>
	<a href = 'http://localhost/HW4/user-list.php'>Back to User List</a><br><br>
	<a href='logout.php'>Logout</a><br><br>
		<form method='post' action='setupusers.php'>
			Forename: <input type='text' name='forename'><br>
			Surname: <input type='text' name='surname'><br>
			Username: <input type='text' name='username'><br>
			Password: <input type='text' name='password'><br>
			<input type='submit' value='Add'>
		</form>
	</body>

</html>



<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){

	$forename = sanitizeMySQL($conn,$_POST['forename']);
	$surname = sanitizeMySQL($conn,$_POST['surname']);
	$username = sanitizeMySQL($conn,$_POST['username']);
	$password = sanitizeMySQL($conn,$_POST['password']);
	
	//password_hash code here
	$token = password_hash($password,PASSWORD_DEFAULT);
	
	//code to add user here
	$query = "insert into user(forename, surname, username, password) values ('$forename', '$surname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}

$conn->close();

function sanitizeString($var){
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}

function sanitizeMySQL($conn, $var){
	$var = sanitizeString($var);
	$var = $conn->real_escape_string($var);
	return $var;
}

?>


