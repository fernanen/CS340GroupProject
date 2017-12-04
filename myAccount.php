<?php include("./header.php");?>
<?php
		if($_SESSION["userName"] != ""){
			echo "<h2>Username:". $_SESSION["userName"] ."</h2>";
			echo "<h2>First Name:".$_SESSION["firstName"]."</h2>";
			echo "<h2>Last Name:".$_SESSION["lastName"]."</h2>";
			echo "<h2>Age:".$_SESSION["age"]."</h2>";
			echo "<h2>Bio:".$_SESSION["bio"]."</h2>";
		}
		else{
			echo "You are not logged in!";
		}
?>
</body>
</html>
