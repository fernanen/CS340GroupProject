
<?php include("./header.php");?>
<?php
	// Get login Credentials Using this file
	include 'connectCredentials.php';

	// attempt to connect to database
	$connected = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	//check if connected
	if(!$connected)
	{
		die('Could Not Connect: ' . mysql_error());
	}

	//Escape user Inputs for Security
	$reviewContent = mysqli_real_escape_string($connected, $_POST['Review']);
	$score = mysqli_real_escape_string($connected, $_POST['Score']);
	$userName = $_SESSION["userName"];
	$userinput = mysqli_real_escape_string($connected, $_POST['gameID']);
	$date = date('Y-m-d');
	if(!empty($reviewContent) && !empty($score) && ($score > 0) && ($score <= 100)){
		$queryTodo = "SELECT userName FROM UserReview WHERE userName = '$userName' and gameID = '$userinput'";
		$result = mysqli_query($connected,$queryTodo);
		if(!$result)
		{
			echo "QUERY FAILED";
		}
		$row = $result->fetch_row();
		if(empty($row))
		{
			//attempt insert query
			$query = "INSERT INTO UserReview (username, gameID, reviewContent, score, datePosted) VALUES ('$userName','$userinput','$reviewContent','$score', '$date')";
			//check if query was successful
	        if(mysqli_query($connected, $query))
			{
	                echo "<div class =\"outwrapper\"><div class=\"textwrapper\">Record added successfully.<br>
						<a href=./game.php?ID=" . $userinput . ">Return to the previous page.</a>";
	        } else
			{
	                echo "ERROR: Could not able to execute $query. " . mysqli_error($connected);
	        }
		}
		else
		{
			$query2 = "UPDATE UserReview SET reviewContent = '$reviewContent', score = '$score', datePosted = '$date' WHERE userName = '$userName' and gameID = '$userinput'";
			if(mysqli_query($connected, $query2))
			{
	                echo "<div class =\"outwrapper\"><div class=\"textwrapper\">Record updated successfully.<br>
						<a href=./game.php?ID=" . $userinput . ">Return to the previous page.</a>";
	        } else
			{
	                echo "ERROR: Could not able to execute $query2. " . mysqli_error($connected);
	        }
		}
	}
	else{
		echo "Please complete the form with valid entries to submit a review.";
	}
	// close connection
	mysqli_close($connected);
?>
</body>
</html>
