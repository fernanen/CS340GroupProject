<?php session_start(); ?>
<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>Game Review Website</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head> 
<body>
	<h2 class = "main">Game Review Website</h2>
	<!-- this is the first navigation bar -->
	<div class = "navbar"> 
		<li class="floatleft"><a href = ./mainPage.php > Home </a></li>
		<li class="floatleft"><div class = "dropdown">
			<button class = "dropbtn">Account
				<i class="fa fa-caret-down"></i>
			</button>
			<div class = "dropdown-content">
				<a href = ./myAccount.php>My Profile</a>
				<a href = ./myReviews.php>My Reviews</a>
				<a href = ./updateBioPage.php> My Bio </a>
			</div>
		</div></li>
		<li class="floatleft"><a href = ./about.php> About </a></li> 
		<li class="floatright"><a href = ./logout.php> Log Out </a></li> 
		<li class="floatright"><a href = ./login.php> Log In </a></li> 
</div>
