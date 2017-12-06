<?php include("./header.php");?>
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

				$_SESSION["userName"]= $row[0];

				echo "<div class =\"outwrapper\"><div class=\"textwrapper\">
				<a style=\"font-size:32px;\"><b>Logged in!</b></a>";
				//print_r($_SESSION);
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
		echo "Missing Credendtials inputed";
	}
?>
	</body>
	</html>
