<?php
session_start();
?>
<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>Register</title>
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
		echo "<h2>Username:".$_SESSION["userName"]."</h2>";
		echo "<h2>First Name:".$_SESSION["firstName"]."</h2>";
		echo "<h2>Last Name:".$_SESSION["lastName"]."</h2>";
		echo "<h2>Age:".$_SESSION["age"]."</h2>";
		echo "<h2>Bio:fw".$_SESSION["bio"]."</h2>";
		print_r($_SESSION);
		echo "<a> Update personal information </a>";
?>
</body> 
</html> 