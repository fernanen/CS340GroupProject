<?php
session_start();
?>
<?php include("./header.php");?>
<body>
<?php

	include 'connectCredentials.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	
	$userinput = mysqli_real_escape_string($conn, $_POST['gameID']);
	$query = "SELECT gameName FROM Games WHERE gameID = $userinput";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);
	
	echo "<h2> You selected $row[0] </h2>"
	
?>
	
</form>
</body>
</html>
