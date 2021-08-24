<?php
    // Doodle Jump App Page
    // Kamil Sacha
    // Last Update: April 30, 2021

    session_start();
    include 'dbh.inc.php';
    include_once 'header.php';
    include 'comments.inc.php';
    $tz = date_default_timezone_get();
    date_default_timezone_set('America/New_York');
?>

<div id="appVisual">
		<img src="DoodleJumpLogo.png" alt="DoodleJumpLogo" id="logo"></img>
		<h3>Doodle Jump</h3>
	</div>

	<div id="appInfo">
		<h3>App Info</h3>
		<p><b>Creator:</b> Lima Sky</p>
		<p><b>Price:</b> Free</p>
		<p><b>App Genre:</b> Game</p>
		<p><b>Description:</b> Doodle Jump takes on a journey with your green friend as you jump accross different maps avoiding foes and collecting power ups on the way</p>
		<p><b>Compatible Platforms:</b> iOS, Android</p>
		<p><b>Version:</b> 3.23.3</p>
		<p><b>Apple App Store Link:</b> <a href="https://apps.apple.com/us/app/doodle-jump/id307727765" target="_blank">Click here</a></p>
		<p><b>Google Play Store Link:  </b><a href="https://play.google.com/store/apps/details?id=com.lima.doodlejump" target="_blank">Click here</a></p>
        <br><br><br>
        <h3>Comments</h3>
	</div>
</div>

<?php
    $commentDb = 'doodleJumpComments';
    if(isset($_SESSION['useruid'])){
        echo "<form method='POST' action='".setComments($conn, $commentDb)."'>
        <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea><br><br>
        <button name='commentSubmit' type='submit'>Comment</button><br><br>
        </form>";
    }else{
        echo "You need to be logged in to comment!<br><br>";
    }

    getComments($conn, $commentDb);
?>