<?php
    // Minecraft App Page
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
		<img src="PaypalLogo.png" alt="PayPalLogo" id="logo">
		<h3>PayPal</h3>
	</div>

	<div id="appInfo">
		<h3>App Info</h3>
		<p><b>Creator:</b> Paypal, Inc.</p>
		<p><b>Price:</b> Free</p>
		<p><b>App Genre:</b> Finance</p>
		<p><b>Description:</b> PayPal allows you to quickly and safely send and recieve money. PayPal allows users to choose different currencies to send around the world. PayPal also allows users to buy, hold, and sell Bitcoin as well as other cryptocurrencies.</p>
		<p><b>Compatible Platforms:</b> iOS, Android</p>
		<p><b>Version:</b> 7.40.0</p>
		<p><b>Apple App Store Link:</b> <a href="https://apps.apple.com/us/app/paypal-mobile-cash/id283646709" target="_blank">Click here</a></p>
		<p><b>Google Play Store Link:  </b><a href="https://play.google.com/store/apps/details?id=com.paypal.android.p2pmobile" target="_blank">Click here</a></p>
        <br><br><br>
        <h3>Comments</h3>
	</div>

    <?php
    if(isset($_SESSION['useruid'])){
        $commentDb = 'paypalComments';
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