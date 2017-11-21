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
		<a href = ./mainPage.php > Home </a>
		<div class = "dropdown">
			<button class = "dropbtn">Account
				<i class="fa fa-caret-down"></i>
			</button>
			<div class = "dropdown-content">
				<a href = ./myAccount.php>My Profile</a>
				<a href = ./myReviews.php>My Reviews</a>
				<a href = ./updateBioPage.php> My Bio </a>
			</div>
		</div>
		<a href = ./about.php> About </a> 
	</div>
	
	<div class="mainwrapper">
	
	<?php
		include 'connectCredentials.php';

		$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$connected) {
				die('Could not connect: ' . mysql_error());
		}
		//Retrieve table
		$query = "SELECT * FROM Games ORDER BY gameID";
		//	$query = "SELECT gameID, gameName, esrb, imageURL, console, genre FROM Games NATURAL JOIN Consoles NATURAL JOIN Genre ORDER BY gameID";


		$result = mysqli_query($connected,$query);
		if(!$result)
		{
			die("Query to show fields from table failed");
		}
	
		echo "<div class = \"gamelistwrapper\">";
		
		while($row = mysqli_fetch_row($result))
		{
			echo "<li class = \"gamewrapper\"><img class = \"boxart\" src = \"$row[6]\"><br>$row[1]</li>";
		}
		
		echo "</div>";
	
	?>
	
	
	</div>
	<!----> 
</body>
</html> 