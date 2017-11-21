<?php
session_start();
?>
<?php include("./header.php");?>
<?php
		print_r($_SESSION);
		echo "<h2>Username:". $_SESSION["userName"] ."</h2>";
		echo "<h2>First Name:".$_SESSION["firstName"]."</h2>";
		echo "<h2>Last Name:".$_SESSION["lastName"]."</h2>";
		echo "<h2>Age:".$_SESSION["age"]."</h2>";
		echo "<h2>Bio:".$_SESSION["bio"]."</h2>";
		// print_r($_SESSION);
		// echo "<a> Update personal information </a>";
?>
</body> 
</html> 
