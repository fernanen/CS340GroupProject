<?php include("./header.php");?>
	<div class="mainwrapper">

	<?php
		include 'connectCredentials.php';

		$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$connected) {
				die('Could not connect: ' . mysql_error());
		}
		//Retrieve table
		$query = "SELECT * FROM Games ORDER BY gameID";
		//	$query = "SELECT gameID, gameName, esrb, imageURL, console, genre FROM Games NATURAL JOIN Consoles NATURAL JOIN Genre ORDER BY gameID";


		$result = mysqli_query($connected,$query);
		if(!$result)
		{
			die("Query to show fields from table failed");
		}
	
		echo "<div class = \"gamelistwrapper\">";
		
		while($row = mysqli_fetch_row($result))
		{
			echo 	"<li class = \"gamewrapper\">
					<div class = \"artwrapper\"><img class = \"boxart\" src = \"$row[6]\"></div><br>
					<a href=./game.php?ID=" . $row[0] . ">$row[1]</a></li>";
		}
		
		echo "</div>";
	
	?>
	</div>
	<!----> 
</body>
</html> 