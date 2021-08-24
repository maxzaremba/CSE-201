<?php
	// Registration/Sign Up Page
	// Kamil Sacha
	// Last Update: April 30, 2021
	include_once 'header.php';
?>

<div id="signupform">
	<h2>Sign Up</h2>
	<form action="signup.inc.php" method="post">
		<input type = "text" name="email" placeholder="Email..."><br><br>
		<input type = "text" name="uid" placeholder="Username..."><br><br>
		<input type = "password" name="pwd" placeholder="Password..."><br><br>
		<input type = "password" name="pwdrepeat" placeholder="Repeat Password..."><br><br>
		<button type="submit" name="submit">Sign Up</button>
	</form>
</div>

<?php
	if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p>Fill in all fields!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "invaliduid"){
			echo "<p>Choose a proper username!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "invalidemail"){
			echo "<p>Choose a proper email!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "passwordsdontmatch"){
			echo "<p>Password doesn't match!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "stmtfailed"){
			echo "<p>Something went wrong, try again!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "usernametaken"){
			echo "<p>Username already taken!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "none"){
			echo "<p>You have signed up!</p>";
		}
	}
?>