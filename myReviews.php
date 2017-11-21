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
				<a href = ./updateBioPage.php>Update Bio </a>
			</div>
		</div>
		<a href = ./about.php> About </a>
	</div>
	<?php
		include 'connectCredentials.php';

			$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$connected) {
					die('Could not connect: ' . mysql_error());
			}
		//Retrieve table
		$uname = $_SESSION["userName"];
		$query = "SELECT gameName, reviewContent, score, datePosted FROM UserReview NATURAL JOIN Games WHERE username = '$uname' ORDER BY gameID";


		$result = mysqli_query($connected,$query);
		if(!$result)
		{
			die("Query to show fields from table failed");
		}

		// get number of columns in the table
		$fieldNum = mysqli_num_fields($result);
		echo"<h1> $table </h1>";
		echo"<table id='t01' border = '1'><tr>";
		//printing table headers
		for($x=0; $x < $fieldNum; $x++)
		{
			$field = mysqli_fetch_field($result);
			echo "<td><b>$field->name</b></td>";
		}
		echo "<tr>\n";
		while($row = mysqli_fetch_row($result))
		{
					echo "<tr>";
					// $row is array... foreach( .. ) puts every element
					// of $row to $cell variable
					foreach($row as $cell)
							echo "<td>$cell</td>";
					echo "</tr>\n";
			}
			mysqli_free_result($result);
			mysqli_close($conn);
	?>
</body>
</html>
