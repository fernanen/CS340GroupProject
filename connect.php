<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>connecting</title>
	</head> 
<body> 
<?php
	// Get login Credentials Using this file 
	include 'connectCredentials.php';
	function incorrectLogin()
	{
		echo "incorrecct Login or password";
		echo "<br>";
		echo "<a href=./login.php>Retry	</a>";
		echo "<br>";
		echo "<a href=./login.php>Forgot Pasword</a>";
	}
	// attempt to connect to database 
	$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	//check if connected 
	if(!$connected)
	{
		die('Could Not Connect: ' . mysql_error());
	}

	$UserName = mysqli_real_escape_string($connected, $_POST['UserName']);
	$Password = mysqli_real_escape_string($connected, $_POST['Password']);

	if(!empty($UserName) && !empty($Password))
	{
		$queryTodo = "SELECT * FROM Users WHERE UserName = '$UserName'";
		$query = mysqli_query($connected,$queryTodo);
		if(!$query)
		{
			echo "QUERY FAILED";
		}

		$row = $query->fetch_row();
		echo "<br>";

		if(!empty($row))
		{
			if(password_verify($Password,$row[4]))
			{
				echo "successfully logged in!";
				echo "<br>";
			}
			else
			{
				incorrectLogin();
			}
		}
		else 
		{
			incorrectLogin();
		}
	}
	else 
	{
		echo "missing Credendtials inputed"; 
	}
?>