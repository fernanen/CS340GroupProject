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

	//Escape user Input for Security
    $bio = mysqli_real_escape_string($connected, $_POST['bio']);

	//attempt update query
	$uname = $_SESSION["userName"];
	$query = "UPDATE Users SET bio = '$bio' WHERE username = '$uname'";

	//check if query was successful
    if(mysqli_query($connected, $query))
	{
            echo "Record added successfully.";
    } else
	{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($connected);
    }

	// close connection
	mysqli_close($connected);
?>
</body>
</html>
