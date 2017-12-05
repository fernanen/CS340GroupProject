<?php include("./header.php");?>
	<?php
		include 'connectCredentials.php';

			$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$connected) {
					die('Could not connect: ' . mysql_error());
			}
		//Retrieve table
		$uname = $_SESSION["userName"];
		$query = "SELECT gameName, reviewContent, score, datePosted, gameID FROM UserReview NATURAL JOIN Games WHERE username = '$uname' ORDER BY gameID";


		$result = mysqli_query($connected,$query);
		if(!$result)
		{
			die("Query to show fields from table failed");
		}

		// get number of columns in the table
		$fieldNum = mysqli_num_fields($result);
		echo"<div class =\"outwrapper\"><div class=\"textwrapper\">";
		
		echo"<table><tr>";
		//printing table headers

		echo "<tr>\n";
		while($row = mysqli_fetch_row($result))
		{
			echo 	"<table>
					<tr>
						<td><b>Game:</b></td>
						<td><a href=./game.php?ID=" . $row[4] . ">$row[0]</a></td>
					</tr>
					<tr>
						<td><b>Review:</b></td>
						<td>$row[1]</td>
					</tr>
					</table>";
			echo	"<tr>
						<td><b>Score:</b></td>
						<td class = \"rawscore\">$row[2]</td>
					</tr>";
			echo	"<tr>
						<td><b>Date:</b></td>
						<td>$row[3]</td>
					</tr>
					</table>
					<br>";
			}
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</body>
</html>
