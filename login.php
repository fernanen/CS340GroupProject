<?php include("./header.php");?>
	<center><h2 class = "Login">Login</h1></center>
		<form name = "login" class = "Login" method = "post" action = "connect.php">
			<p>
				<label for="UserName" >Username:</label>
				<input type="text" name="UserName" id = "UserName">
			</p>
			<p>
				<label for="Password">Password:</label>
				<input type="text" name="Password" id = "Password">
			</p>
			<input type="submit" value = "Submit">
		</form>
</body>
</html>
