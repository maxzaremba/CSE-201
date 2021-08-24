<?php
    // Venmo App Page
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
		<img src="VenmoLogo.png" alt="VenmoLogo" id="logo"></img>
		<h3>Venmo</h3>
	</div>

	<div id="appInfo">
		<h3>App Info</h3>
		<p><b>Creator:</b> Paypal, Inc.</p>
		<p><b>Price:</b> Free</p>
		<p><b>App Genre:</b> Finance</p>
		<p><b>Description:</b> Venmo allows you to quickly and safely send and recieve money. Venmo allows users to make purchases in select stores as well as in select apps online. Venmo allows users to transfer money to and from their bank accounts with no fee.</p>
		<p><b>Compatible Platforms:</b> iOS, Android</p>
		<p><b>Version:</b> 8.19.3</p>
		<p><b>Apple App Store Link:</b> <a href="https://apps.apple.com/us/app/venmo/id351727428#?platform=iphone" target="_blank">Click here</a></p>
		<p><b>Google Play Store Link:  </b><a href="https://play.google.com/store/apps/details?id=com.venmo" target="_blank">Click here</a></p>
        <br><br><br>
        <h3>Comments</h3>
	</div>

    <?php
    $commentDb = 'venmoComments';
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