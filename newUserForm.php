<?php
session_start();
?>
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
</script>
<form name = "credentials" class = "Login" action = "registerUser.php" method = "post" >
		<p>
			<label for="UserName">Username:</label>
			<input type="text" name="UserName" id = "UserName" placeHolder = "new username" required onblur = "validateUsername()">
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
            <input type="text" name="Password" id = "Password" placeHolder = "Password" required>
        </p>
		<p>
			<label for="Age">Age:<label> 
			<input type="text" name = "Age" id = "Age" placeHolder = "Age">
		</p>
		<p> 
			<label for="Age">bio:<label> 
			<input type="text" name = "bio" id = "bio" placeHolder = "bio">
		</p>
	<input type = "submit" value = "submit">
</form> 
</body>
</html> 