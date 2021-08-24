<?php
	// Sign In/Log In Page
	// Kamil Sacha
	// Last Update: April 30, 2021
	include_once 'header.php';
?>

<div id="signupform">
	<h2>Log In</h2>
	<form action="login.inc.php" method="post">
		<input type = "text" name="uid" placeholder="Username/Email"><br><br>
		<input type = "password" name="pwd" placeholder="Password..."><br><br>
		<button type="submit" name="submit">Log In</button>
	</form>
</div>

<?php
	if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p>Fill in all fields!</p>";
		}
	}

	if(isset($_GET["error"])){
		if($_GET["error"] == "wronglogin"){
			echo "<p>Incorrect login information!</p>";
		}
	}
?>

