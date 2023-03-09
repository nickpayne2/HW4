<?php

	require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['id'])){
	
$id = $_GET['id'];	

$query = "SELECT * FROM user where id=$id ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
		
echo <<<_END
	
	<form action='updateRecord.php' method='post'>

	<pre>
	
	username: <input type='text' name='username' value='$row[username]'>
	surname: <input type='text' name='surname' value='$row[surname]'>
	forename: <input type='text' name='forename' value='$row[forename]'>
	password: <input type='text' name='password' value='$row[password]'>
		
	</pre>
		
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
		<input type='submit' value='UPDATE User'>	
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$id = $_POST['id'];
	$username = $_POST['username'];
	$surname = $_POST['surname'];
	$forename = $_POST['forename'];
	$password = $_POST['password'];
	
	$query = "Update user set username='$username', surname='$surname', forename='$forename', password='$password' where id = $id ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-list.php");
	
	
}

$conn->close();



?>