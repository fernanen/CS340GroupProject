<?php include("./header.php");?>
<?php
		if($_SESSION["userName"] != ""){			
			include 'connectCredentials.php';

			$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			//check if connected
			if(!$connected)
			{
				die('Could Not Connect: ' . mysql_error());
			}
			
			$userinput = mysqli_real_escape_string($connected, $_GET['userName']);
			
			$queryTodo = "SELECT * FROM Users WHERE userName = '$userinput'";
			$query = mysqli_query($connected,$queryTodo);
			if(!$query)
			{
				echo "QUERY FAILED";
			}

			$row = $query->fetch_row();
			
			echo 	"<div class =\"outwrapper\"><div class=\"textwrapper\">
					<a style=\"font-size:32px;\"><b>" . $row[0] . "'s Profile</b></a><br><br>
					<table class = \"profile\">
					<tr>
						<td><b>Username:</b></td>
						<td>$row[0]</td>
					</tr>
					<tr>
						<td><b>Full Name:</b></td>
						<td>$row[2] $row[3]</td>
					</tr>
					<tr>
						<td><b>Age:</b></td>
						<td>$row[4]</td>
					</tr>
					<tr>
						<td><b>Bio:</b></td>
						<td>$row[5]</td>
					</tr>
					</table>
					<p><a href = ./userReviews.php?userName=" . $userinput . " style=\"font-size:20px\">View this user's reviews</p></div></div>";
		}
		else{
			echo "You are not logged in!";
		}
?>
</body>
</html>
