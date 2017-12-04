<?php include("./header.php");?>
<body>
<?php

	include 'connectCredentials.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$userinput = mysqli_real_escape_string($conn, $_GET['ID']);
	$query = "SELECT gameName FROM Games WHERE gameID = $userinput";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);

	echo "<h2> You selected $row[0] </h2>";

	$queryGame = "SELECT gameName, esrb, description, overallCriticScore, overallUserScore, imageURL FROM Games WHERE gameID = $userinput";
	$resultG = mysqli_query($conn, $queryGame);
	$rowG = mysqli_fetch_row($resultG);
	// while($rowG = mysqli_fetch_row($resultG))
	// {
	// 			foreach($rowG as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }
	echo "<br>";
	$queryConsole = "SELECT console, releaseDate FROM Consoles WHERE gameID = $userinput";
	$resultC = mysqli_query($conn, $queryConsole);
	$rowC = mysqli_fetch_row($resultC);
	// while($rowC = mysqli_fetch_row($resultC))
	// {
	// 			foreach($rowC as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }
	echo "<br>";
	$queryGenre = "SELECT genre FROM Genre WHERE gameID = $userinput";
	$resultGe = mysqli_query($conn, $queryGenre);
	$rowGe = mysqli_fetch_row($resultGe);
	// while($rowGe = mysqli_fetch_row($resultGe))
	// {
	// 			foreach($rowGe as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }
	echo "<br>";
	$queryUserR = "SELECT username, reviewContent, score, datePosted FROM UserReview WHERE gameID = $userinput";
	$resultUR = mysqli_query($conn, $queryUserR);
	$rowUR = mysqli_fetch_row($resultUR);
	// while($rowUR = mysqli_fetch_row($resultUR))
	// {
	// 			foreach($rowUR as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }
	echo "<br>";
	$queryCriticR = "SELECT url, websiteName, authorName, score, reviewContent, datePosted FROM CriticReview WHERE gameID = $userinput";
	$resultCR = mysqli_query($conn, $queryCriticR);
	$rowCR = mysqli_fetch_row($resultCR);
	// while($rowCR = mysqli_fetch_row($resultCR))
	// {
	// 			foreach($rowCR as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }

	//$rowG[0] = gameName
	//$rowG[1] = esrb
	//$rowG[2] = description
	//$rowG[3] = overallCriticScore
	//$rowG[4] = overallUserScore
	//$rowG[5] = imageURL
	//$rowC[0] = console
	//$rowC[1] = releaseDate
	//$rowGe[0] = genre
	//$rowUR[0] = userName
	//$rowUR[1] = reviewContent
	//$rowUR[2] = score
	//$rowUR[3] = datePosted
	//$rowCR[0] = url
	//$rowCR[1] = websiteName
	//$rowCR[2] = authorName
	//$rowCR[3] = score
	//$rowCR[4] = reviewContent
	//$rowCR[5] = datePosted

//boxArt --	DOESNT WORK
	echo "<div class = \"artwrapper\"><img class = \"boxart\" src = \"$row[5]\"></div>";
// Game Name
	echo "$rowG[0]";
	echo "<br>";
// Genres
	echo "Genres:";
	while($rowC = mysqli_fetch_row($resultC))
	{
				foreach($rowC as $cell)
						echo "<td>$cell </td>";
				echo "<br>";
	}


?>

</form>
</body>
</html>
