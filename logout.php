<?php
	session_start();
?>
<?php include("./header.php");?>
	<?php
	unset($_SESSION);
	session_destroy();
	echo "Logged out!"; 
	?>
	</body>
</html>