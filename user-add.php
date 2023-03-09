<HTML>

	<HEAD>

		<title>Add a new user</title>

	</HEAD>

	<BODY>
		<H1>Add a new user</H1>
		<a href="login-form.php">login-form</a>
		<a href="user-details.php">user-details</a>
		<a href="user-list.php">user-list</a>
		<form method='post' action='user-add.php'>
			<pre>
				ID: <input type='text' name='id'>
				Username: <input type='text' name='username'>
				Forename: <input type='text' name='forename'>
				Surname: <input type='text' name='surname'>
				Password: <input type='text' name='password'>
				<input type='submit' value='Add Record'>
			</pre>

		</form>

	</BODY>

</HTML>

<?php
//import credentials for db
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['id'])) 
{
	//Get data from POST object
	$id = $_POST['id'];
	$username = $_POST['username'];
	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$password = $_POST['password'];
	
	//echo $isbn.'<br>';
	
	$query = "INSERT INTO HW3 (id, username, forename, surname, password) VALUES ('$id', '$username','$forename', '$surname', '$password')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-list.php");//this will return you to the view all page
	
	
	
	
}



?>