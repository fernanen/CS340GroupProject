<?php
	session_start();
 ?>
<!DOCTYPE html>
<!-- Get new User Info-->
<html>
	<head>
		<title>Register</title>
					<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head>
<body class = "Update">
<a href = ./mainPage.php>Home</a>
<h2 class = "Update">Write your update user bio below:</h2>
<form name = "updateContent" class = "Bio" action = "updateBio.php" method = "post" >
		<p>
			<label for="Bio">Bio:<label>
			<input type="text" name = "bio" id = "bio" placeHolder = "New Bio">
		</p>
	<input type = "submit" value = "submit">
</form>
</body>
</html>
