<?php session_start(); ?>
<!DOCTYPE html>
<!--Insert Into HW1 Users Table CS 340-->
<html>
	<head>
		<title>Game Review Website</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head>
<body>
	<h2 class = "main"><a href = ./mainPage.php>Game Review Website</a></h2>
	<!-- this is the first navigation bar -->
	<div class = "navbar">
		<li class="floatleft"><a href = ./mainPage.php > Home </a></li>
		<?php
			if($_SESSION["userName"] != ""){
				echo "<li class=\"floatleft\"><div class = \"dropdown\">
					<button class = \"dropbtn\">Account
						<i class=\"fa fa-caret-down\"></i>
					</button>
					<div class = \"dropdown-content\">
						<a href = ./myAccount.php>My Profile</a>
						<a href = ./myReviews.php>My Reviews</a>
						<a href = ./updateBioPage.php> Update Bio </a>
					</div>
				</div></li>";
			}
		?>
		<li class="floatleft"><a href = ./about.php> About </a></li>
		<?php
			if($_SESSION["userName"] != ""){
				echo "<li class=\"floatright\"><a href = ./logout.php> Log Out </a></li>";
			}
			else{
				echo "<li class=\"floatright\"><a href = ./login.php> Log In </a></li>";
				echo "<li class=\"floatright\"><a href = ./newUserForm.php> Sign Up </a></li>";
			}
			echo "<li class=\"floatright searchbar\"> <form method = \"post\" action = \"searchPage.php\"> <input type = \"text\" name = \"search\" id = \"search\"> <input type=\"submit\" value=\"Search\"> </form> </li>";
		?>
</div>