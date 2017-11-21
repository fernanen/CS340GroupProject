<?php
session_start();
?>
<?php include("./header.php");?>
	<?php
		include 'connectCredentials.php';

			$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$connected) {
					die('Could not connect: ' . mysql_error());
			}
		//Retrieve table
		$uname = $_SESSION["userName"];
		$query = "SELECT gameName, reviewContent, score, datePosted FROM UserReview NATURAL JOIN Games WHERE username = '$uname' ORDER BY gameID";


		$result = mysqli_query($connected,$query);
		if(!$result)
		{
			die("Query to show fields from table failed");
		}

		// get number of columns in the table
		$fieldNum = mysqli_num_fields($result);
		echo"<h1> $table </h1>";
		echo"<table id='t01' border = '1'><tr>";
		//printing table headers
		for($x=0; $x < $fieldNum; $x++)
		{
			$field = mysqli_fetch_field($result);
			echo "<td><b>$field->name</b></td>";
		}
		echo "<tr>\n";
		while($row = mysqli_fetch_row($result))
		{
					echo "<tr>";
					// $row is array... foreach( .. ) puts every element
					// of $row to $cell variable
					foreach($row as $cell)
							echo "<td>$cell</td>";
					echo "</tr>\n";
			}
			mysqli_free_result($result);
			mysqli_close($conn);
	?>
</body>
</html>
