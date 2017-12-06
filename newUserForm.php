<?php include("./header.php");?>

<?php
	function validateUsername()
	{
		include 'connectCredentials.php';
		// attempt to connect to database
		$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		//check if connected
		if(!$connected)
		{
			die('Could Not Connect: ' . mysql_error());
		}
	}
	?>
<div class ="outwrapper"><div class="textwrapper">
<h2 style="margin-top:0px;font-size:32px;">Sign Up</h2>
<form name = "credentials" class = "Login" action = "registerUser.php" method = "post" >
		<p>
			<label for="UserName">Username:</label>
			<input type="text" name="UserName" id = "UserName" placeHolder = "Username" required onblur = "validateUsername()">
		</p>
		<?php?>
        <p>
            <label for="FirstName">First Name:</label>
            <input type="text" name="FirstName" id = "FirstName" placeHolder = "First Name" required>
        </p>
        <p>
            <label for="LastName">Last Name:</label>
            <input type="text" name="LastName" id = "Lastname" placeHolder = "Last Name" required>
        </p>
        <p>
            <label for="Password">Password:</label>
            <input type="password" name="Password" id = "Password" placeHolder = "Password" required>
        </p>
		<p>
			<label for="Age">Age:<label>
			<input type="text" name = "Age" id = "Age" placeHolder = "Age">
		</p>
		<p>
			<label for="Age">Bio:<label>
			<input type="text" name = "bio" id = "bio" placeHolder = "Bio">
		</p>
	<input type = "submit" value = "Submit">
</form>
</body>
</html>
