<?php
session_start();
?>
<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>connecting</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head> 
<body>
	<div class = "navbar"> 
		<a href = ./mainPage.php > Home </a>
		<div class = "dropdown">
			<button class = "dropbtn">Account
				<i class="fa fa-caret-down"></i>
			</button>
			<div class = "dropdown-content">
				<a href = ./myAccount.php>My Profile</a>
				<a href = ./myReviews.php>My Reviews</a>
			</div>
		</div>
		<a href = ./about.php> About </a> 
	</div>
<?php
	include 'connectCredentials.php';
	function incorrectLogin()
	{
		echo "incorrect Login or password";
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
		$queryTodo = "SELECT * FROM Users WHERE username = '$UserName'";
		$query = mysqli_query($connected,$queryTodo);
		if(!$query)
		{
			echo "QUERY FAILED";
		}

		$row = $query->fetch_row();
		echo "<br>";

		if(!empty($row))
		{
			if(password_verify($Password,$row[1]))
			{
				if(!$_SESSION["userName"])
					$_SESSION["userName"]='';
				if(!$_SESSION["firstName"])
					$_SESSION["firstName"]='';
				if(!$_SESSION["lastName"])
					$_SESSION["lastName"]='';
				if(!$_SESSION["age"])
					$_SESSION["age"]=0;
				if(!$_SESSION["bio"])
					$_SESSION["bio"]='';

				$_SESSION["userName"]= $row[0]; 
				$_SESSION["firstName"]= $row[2];
				$_SESSION["lastName"]= $row[3];
				$_SESSION["age"]= $row[4]; 
				$_SESSION["bio"]= $row[5]; 
				echo "Successfully logged in!";
				// print_r($_SESSION);
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
	</body>
	</html>
