<!DOCTYPE html> 
<!--Insert Into HW1 Users Table CS 340--> 
<html> 
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="myStyle.css">
	</head> 
<body> 
	<h2> WELCOME TO OUR HOME PAGE </h2>
	<p> This is going to be our main page for the project. as of now we have registration, login, and list users available </p>
	<!-- this is the first navigation bar -->
	<div class = "navbar"> 
		<a> Home </a>
		<a> Games </a>
		<a> User Critics</a>
		<div class = "dropdown">
			<button class = "dropbtn">Account
				<i class="fa fa-caret-down"></i>
			</button>
			<div class = "dropdown-content">
				<a>My Profile</a>
				<a>My Reviews</a>
				<a>Link3</a>
				<a>Link4</a>
			</div>
		</div>
		<a> Account </a> 
		<a> About </a> 
	</div>
	<!----> 
	<!-- this is the second navigation bar -->
	<ul>
		<li> <a class = "active" href = ./newUserForm.php> Sign Up </a></li>
		<li> <a href = ./login.php> Login </a></li>
		<li> <a href = ./listUsers.php> List Users </a> </li> 
	</ul>
	<!---->
</body>
</html> 