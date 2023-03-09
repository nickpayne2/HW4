<HTML>

	<HEAD>

		<title>User List</title>
	

	</HEAD>

	<BODY>
		<H1>User List</H1>
		<a href="login-form.php">login-form</a>
		<a href="user-details.php">user-details</a>
		<a href="user-add.php">user-add</a>

	</BODY>

</HTML>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM HW3";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ID: <a href='user-details.php?id=$row[id]'>$row[id]</a>
	Forename: $row[forename]
	Surname: $row[surname]
	</pre>
	
	<form action='user-add.php' method='post'>
		<input type='hidden' name='add' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
	</form>
	
_END;

}

$conn->close();



?>