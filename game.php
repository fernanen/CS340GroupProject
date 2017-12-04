<?php include("./header.php");
session_start();?>
<body>
<?php

	include 'connectCredentials.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$userinput = mysqli_real_escape_string($conn, $_GET['ID']);
	$query = "SELECT gameName FROM Games WHERE gameID = '$userinput'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);

	echo "<h2> You selected $row[0] </h2>";

	$queryGame = "SELECT gameName, esrb, description, overallCriticScore, overallUserScore, imageURL FROM Games WHERE gameID = $userinput";
	$resultG = mysqli_query($conn, $queryGame);
	$rowG = mysqli_fetch_row($resultG);


//boxArt --	DOESNT WORK
	echo "<div class = \"artwrapper\"><img class = \"boxart\" src = \"$rowG[5]\"></div>";
// Game Name
	echo "$rowG[0]";
	echo "<br>";
// Genres
	echo "Genres: ";
	$queryGenre2 = "SELECT genre FROM Genre WHERE gameID = $userinput";
	$resultGe2 = mysqli_query($conn, $queryGenre2);
	while($rowGe2 = mysqli_fetch_row($resultGe2))
	{
				foreach($rowGe2 as $cell)
						echo "<td>$cell</td>";
				echo ", ";
	}
	echo "<br>";
//esrb
	echo "ESRB: $rowG[1]";
	echo "<br>";
//Consoles and release dates
	echo "Consoles - ";
	echo "<br>";
	$queryConsole = "SELECT console, releaseDate FROM Consoles WHERE gameID = $userinput";
	$resultC = mysqli_query($conn, $queryConsole);
	while($rowC = mysqli_fetch_row($resultC))
	{
				foreach($rowC as $cell)
						echo "<td>$cell </td>";
				echo "<br>";
	}
//description
	echo "$rowG[2]";
	echo "<br>";
//Avg User Score
	echo "Average User Score: $rowG[4]";
	echo "<br>";
//Avg Critic Score
	echo "Average Critic Score: $rowG[3]";
	echo "<br>";
//Critic reviews
	$queryCriticR = "SELECT url, websiteName, authorName, score, reviewContent, datePosted FROM CriticReview WHERE gameID = $userinput";
	$resultCR = mysqli_query($conn, $queryCriticR);
	$rowCR = mysqli_fetch_row($resultCR);
	$fieldNumCR = mysqli_num_fields($resultCR);
	echo"<h1> $table </h1>";
	echo"<table id='t01' border = '1'><tr>";
	//printing table headers
	for($x=0; $x < $fieldNumCR; $x++)
	{
		$fieldCR = mysqli_fetch_field($resultCR);
		echo "<td><b>$fieldCR->name</b></td>";
	}
	while($rowCR = mysqli_fetch_row($resultCR))
	{
		echo "<tr>";
		foreach($rowCR as $cell)
				echo "<td>$cell </td>";
		echo "<br>";
		echo "</tr>";
	}
//User Reviews
	$queryUserR = "SELECT username, reviewContent, score, datePosted FROM UserReview WHERE gameID = $userinput";
	$resultUR = mysqli_query($conn, $queryUserR);
	$rowUR = mysqli_fetch_row($resultUR);
	$fieldNumUR = mysqli_num_fields($resultUR);
	echo"<h1> $table </h1>";
	echo"<table id='t01' border = '1'><tr>";
	//printing table headers
	for($x=0; $x < $fieldNumUR; $x++)
	{
		$fieldUR = mysqli_fetch_field($resultUR);
		echo "<td><b>$fieldUR->name</b></td>";
	}
	while($rowUR = mysqli_fetch_row($resultUR))
	{
				echo "<tr>";
				foreach($rowUR as $cell)
						echo "<td>$cell </td>";
				echo "<br>";
				echo "</tr>";
	}

	if($_SESSION["userName"] != ""){
		echo "Write/Update a Review!";
		echo "<br>";
		echo "	<form name = \"credentials\" class = \"Login\" action = \"postReview.php\" method = \"post\" >
	<p>
					<label for=\"Review\">Review:<label>
					<input type=\"text\" name = \"Review\" id = \"Review\">
				</p>
				<p>
					<label for=\"Score\">Score:<label>
					<input type=\"number\" name = \"Score\" id = \"Score\" placeHolder = \"0 - 100\">
				</p>
				<input type =\"hidden\" name = \"gameID\" id = \"gameID\" value = \"$userinput\">
			<input type = \"submit\" value = \"Submit\">
			</form>";
	}
?>

</form>
</body>
</html>
