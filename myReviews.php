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
</body> 
</html> 