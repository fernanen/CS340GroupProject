<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head> 
<body> 
	<h2> WELCOME TO OUR HOME PAGE </h2>
	<p> This is going to be our main page for the project. as of now we have registration, login, and list users available </p>
	<!-- this is the first navigation bar -->
	<div class = "navbar"> 
		<a href = ./mainPage.php > Home </a>
		<div class = "dropdown">
			<button class = "dropbtn">Account
				<i class="fa fa-caret-down"></i>
			</button>
			<div class = "dropdown-content">
				<a href = ./myAccount.php>My Profile</a>
				<a href = ./myReviews.php>My Reviews</a>
				<a href = ./updateBioPage.php> my Bio </a>
			</div>
		</div>
		<a href = ./about.php> About </a> 
	</div>
	<!----> 
	<?php 
		
	?>
</body>
</html> 