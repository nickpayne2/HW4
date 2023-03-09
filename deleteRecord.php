<?php

$page_roles=array('admin');
	require_once  'checksession.php';

//import credentials for db
	require_once  'login.php';

//connect to db
			$conn = new mysqli($hn, $un, $pw, $db);
			if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
	$id = $_POST['id'];

	$query = "DELETE FROM user WHERE id='$id' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: user-list.php?");
	
}


?>