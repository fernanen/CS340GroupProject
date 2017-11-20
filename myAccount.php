<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>Register</title>
	</head> 
<body>
<?php
session_start();
		echo "<h2>Username:".$_SESSION["userName"]."</h2>";
		echo "<h2>First Name:".$_SESSION["firstName"]."</h2>";
		echo "<h2>Last Name:".$_SESSION["lastName"]."</h2>";
		echo "<h2>Age:".$_SESSION["age"]."</h2>";
		echo "<h2>Bio:".$_SESSION["bio"]."</h2>";
	print_r($_SESSION);
?>
</body> 
</html> 