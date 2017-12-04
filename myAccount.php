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
			
			$username = $_SESSION['userName'];
			
			$queryTodo = "SELECT * FROM Users WHERE userName = '$username'";
			$query = mysqli_query($connected,$queryTodo);
			if(!$query)
			{
				echo "QUERY FAILED";
			}

			$row = $query->fetch_row();
			
			echo 	"<div class =\"outwrapper\"><div class=\"textwrapper\">
					<li class = \"profile\">Username: $row[0]</li>";
			
		}
		else{
			echo "You are not logged in!";
		}
?>
</body>
</html>
