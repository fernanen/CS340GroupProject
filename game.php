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
	// $queryUserR = "SELECT username, reviewContent, score, datePosted FROM UserReview WHERE gameID = $userinput";
	// $resultUR = mysqli_query($conn, $queryUserR);
	// $rowUR = mysqli_fetch_row($resultUR);
	// while($rowUR = mysqli_fetch_row($resultUR))
	// {
	// 			foreach($rowUR as $cell)
	// 					echo "<td>$cell </td>";
	// 			echo "<br>";
	// }
	echo "<br>";
	// $queryCriticR = "SELECT url, websiteName, authorName, score, reviewContent, datePosted FROM CriticReview WHERE gameID = $userinput";
	// $resultCR = mysqli_query($conn, $queryCriticR);
	// $rowCR = mysqli_fetch_row($resultCR);
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
	for($x=0; $x < $fieldNum; $x++)
	{
		$fieldCR = mysqli_fetch_field($resultCR);
		echo "<td><b>$fieldCR->name</b></td>";
	}
	while($rowCR = mysqli_fetch_row($resultCR))
	{
				echo "<td> </td>";
				echo "<br>";
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
				foreach($rowUR as $cell)
						echo "<td>$cell </td>";
				echo "<br>";
	}
?>

</form>
</body>
</html>
