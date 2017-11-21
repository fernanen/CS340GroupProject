<?php
session_start();
?>
<?php include("./header.php");?>
<?php
	// Get login Credentials Using this file 
	include 'connectCredentials.php';
	
	// attempt to connect to database 
	$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//check if connected 
	if(!$connected)
	{
		die('Could Not Connect: ' . mysql_error());
	}
	
	//Escape user Inputs for Security 
	$UserName = mysqli_real_escape_string($connected, $_POST['UserName']);
	$FirstName = mysqli_real_escape_string($connected, $_POST['FirstName']);
	$LastName = mysqli_real_escape_string($connected, $_POST['LastName']);
	$bio = mysqli_real_escape_string($connected, $_POST['bio']);
	$PasswordInput = mysqli_real_escape_string($connected, $_POST['Password']);
	$Age = mysqli_real_escape_string($connected,$_POST['Age']);
	$Password = Password_hash($PasswordInput,PASSWORD_DEFAULT);
	// checking username
	$queryTodo = "SELECT * FROM Users WHERE UserName = '$UserName'";
	$result = mysqli_query($connected,$queryTodo);
	if(!$result)
	{
		echo "QUERY FAILED";
	}
	$row = $result->fetch_row();
	if(empty($row))
	{

		//attempt insert query
		$query = "INSERT INTO Users (username,password,firstName,lastName,age,bio) VALUES ('$UserName','$Password','$FirstName','$LastName','$Age','$bio')";
		//check if query was successful 
        if(mysqli_query($connected, $query))
		{
                echo "Record added successfully.";
        } else
		{
                echo "ERROR: Could not able to execute $query. " . mysqli_error($connected);
        }
	}
	else 
	{
		echo "UserName Taken!!!!";
		echo "<br>";
		echo "<a href=./newUserForm.php> Retry	</a>";
		echo "<br>";
	}
	// close connection 
	mysqli_close($connected);
?>
</body>
</html>
