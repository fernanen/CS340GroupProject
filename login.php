<!DOCTYPE html>
<html>
	<head>
			<title>Login</title>
			<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head>
<body class = "Login">
<a href = ./mainPage.php> home</a>
	<h1> Our Logo Goes here </h1>
	<h2 class = "Login">Login</h1>
		<form name = "login" class = "Login" method = "post" action = "connect.php">
			<p>
				<label for="UserName" >Username:</label>
				<input type="text" name="UserName" id = "UserName">
			</p> 
			<p>
				<label for="Password">Password:</label>
				<input type="text" name="Password" id = "Password">
			</p> 
			<input type="submit" value = "submit">
		</form>
</body>
</html>