<?php include("./header.php");?>
<div class ="outwrapper"><div class="textwrapper">
<a style="font-size:32px;"><b>My Profile</b></a><br><br>
<form name = "updateContent" class = "Bio" action = "updateBio.php" method = "post" >
		<p>
			<label for="Bio"><b>Bio:</b><label>
			<input type="text" name = "bio" id = "bio" placeHolder = "New Bio" style="width:400px;">
		</p>
	<input type = "submit" value = "Submit">
</form>
</body>
</html>
