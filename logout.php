<?php include("./header.php");?>
	<?php
	unset($_SESSION);
	session_destroy();
	echo "<div class =\"outwrapper\"><div class=\"textwrapper\">
	<a style=\"font-size:32px;\"><b>Logged out!</b></a>"; 
	?>
	</body>
</html>