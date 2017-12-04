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
			echo "<li class = \"gamewrapper\">";
			
			if($row[4] > 70){
				echo "<div class = \"goodscore score critic\">Critic<br>$row[4]</div>";
			}
			
			elseif($row[4] > 50){
				echo "<div class = \"mixedscore score critic\">Critic<br>$row[4]</div>";
			}
			
			else{
				echo "<div class = \"badscore score critic\">Critic<br>$row[4]</div>";
			}
			
			if($row[5] > 70){
				echo "<div class = \"goodscore score user\">User<br>$row[5]</div>";
			}
			
			elseif($row[4] > 50){
				echo "<div class = \"mixedscore score user\">User<br>$row[5]</div>";
			}
			
			else{
				echo "<div class = \"badscore score user\">User<br>$row[5]</div>";
			}
					
			echo "	<div class = \"artwrapper\"><img class = \"boxart\" src = \"$row[6]\"></div><br>
					<a href=./game.php?ID=" . $row[0] . ">$row[1]</a>";
			
			echo "</li>";
			
		}
		
		echo "</div>";
	
	?>
	</div>
	<!----> 
</body>
</html> 