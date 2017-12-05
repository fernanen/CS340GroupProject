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

	echo "<div class =\"outwrapper\"><div class=\"textwrapper\">
	<p style=\"margin-top:0px\"><a style=\"font-size:32px;\"><b> $row[0]</b></a><br><br>";

	$queryGame = "SELECT gameName, esrb, description, overallCriticScore, overallUserScore, imageURL FROM Games WHERE gameID = $userinput";
	$resultG = mysqli_query($conn, $queryGame);
	$rowG = mysqli_fetch_row($resultG);


//boxArt
	echo "<div class = \"artwrapper\"><img class = \"boxart\" src = \"$rowG[5]\"></div>";
// Genres
	echo "<b>Genres:</b> <br>";
	$queryGenre2 = "SELECT genre FROM Genre WHERE gameID = $userinput";
	$resultGe2 = mysqli_query($conn, $queryGenre2);
	while($rowGe2 = mysqli_fetch_row($resultGe2))
	{
		echo "<li>$rowGe2[0]</li>";
	}
//esrb
	echo "<b>ESRB:</b> $rowG[1]";
	echo "<br>";
//Consoles and release dates
	echo "<b>Consoles: </b>";
	echo "<br>";
	$queryConsole = "SELECT console, releaseDate FROM Consoles WHERE gameID = $userinput ORDER BY releaseDate";
	$resultC = mysqli_query($conn, $queryConsole);
	while($rowC = mysqli_fetch_row($resultC))
	{
		echo "<li>$rowC[0] - $rowC[1]</li>";
	}
//description
	echo "$rowG[2]";
	echo "<br><br>";
//scores
			if($rowG[3] > 70){
				echo "<div class = \"goodscore plainscore\">Critic<br>$rowG[3]</div>";
			}
			
			elseif($rowG[3] > 50){
				echo "<div class = \"mixedscore plainscore\">Critic<br>$rowG[3]</div>";
			}
			
			else{
				echo "<div class = \"badscore plainscore\">Critic<br>$rowG[3]</div>";
			}
			
			if($rowG[4] > 70){
				echo "<div class = \"goodscore plainscore\">User<br>$rowG[4]</div>";
			}
			
			elseif($rowG[4] > 50){
				echo "<div class = \"mixedscore plainscore\">User<br>$rowG[4]</div>";
			}
			
			else{
				echo "<div class = \"badscore plainscore\">User<br>$rowG[4]</div>";
			}
	echo "<br>";
	if($_SESSION["userName"] != ""){
		echo "<p>Write/Update a Review!";
		echo "<br>";
		echo "	<form name = \"credentials\" class = \"credentials\" action = \"postReview.php\" method = \"post\" >
	<p>
					<label for=\"Review\">Review:<label>
					<input type=\"text\" name = \"Review\" id = \"Review\" style=\"width:30%;\">
				</p>
				<p>
					<label for=\"Score\">Score:<label>
					<input type=\"number\" name = \"Score\" id = \"Score\" placeHolder = \"0 - 100\">
				</p>
				<input type =\"hidden\" name = \"gameID\" id = \"gameID\" value = \"$userinput\">
			<input type = \"submit\" value = \"Submit\">
			</form></p>";
	}
//Critic reviews
	$queryCriticR = "SELECT url, websiteName, authorName, score, reviewContent, datePosted FROM CriticReview WHERE gameID = $userinput";
	$resultCR = mysqli_query($conn, $queryCriticR);
	echo "<div class=\"reviewwrapper\" style = \"margin:0 5% 0 2.5%;\">";
	while($rowCR = mysqli_fetch_row($resultCR)){
		echo 	"<ul class = \"reviewlist\">
				<li><b>Written by $rowCR[2] for <a href = \"$rowCR[0]\">$rowCR[1]</a> - $rowCR[5]</b></li>
				<li>$rowCR[4]</li>
				<br>
				<li>";
				
		if($rowCR[3] > 70){
				echo "<div class = \"goodscore plainscore\" style=\"line-height:80px;\">$rowCR[3]</div>";
			}
			
		elseif($rowCR[3] > 50){
			echo "<div class = \"mixedscore plainscore\" style=\"line-height:80px;\">$rowCR[3]</div>";
		}
		
		else{
			echo "<div class = \"badscore plainscore\" style=\"line-height:80px;\">$rowCR[3]</div>";
		}
		echo	"</li></ul><div class = \"divider\"><br></div>";
	}
	echo "</div>";

//User Reviews
	$queryUserR = "SELECT userName, reviewContent, score, datePosted FROM UserReview WHERE gameID = $userinput";
	$resultUR = mysqli_query($conn, $queryUserR);
	echo "<div class=\"reviewwrapper\">";
	while($rowUR = mysqli_fetch_row($resultUR)){
		echo 	"<ul class = \"reviewlist\">
				<li><b>Written by <a href = ./userAccount.php?userName=" . $rowUR[0] . ">$rowUR[0]</a> - $rowUR[3]</b></li>
				<li>$rowUR[1]</li>
				<br>
				<li>";
				
		if($rowUR[2] > 70){
				echo "<div class = \"goodscore plainscore\" style=\"line-height:80px;\">$rowUR[2]</div>";
			}
			
		elseif($rowUR[2] > 50){
			echo "<div class = \"mixedscore plainscore\" style=\"line-height:80px;\">$rowUR[2]</div>";
		}
		
		else{
			echo "<div class = \"badscore plainscore\" style=\"line-height:80px;\">$rowUR[2]</div>";
		}
		echo	"</li></ul><div class = \"divider\"><br></div>";
	}
	echo "</div>"
?>

</form>
</body>
</html>
