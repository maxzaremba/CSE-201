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
		<img src="MinecraftLogo.jpeg" alt="Minecraft Logo" id="logo"></img>
		<h3>Minecraft</h3>
	</div>

	<div id="appInfo">
		<h3>App Info</h3>
		<p><b>Creator:</b> Mojang AB</p>
		<p><b>Price:</b></p>
		<p><i>iOS:</i> $6.99</p>
		<p><i>Android:</i> $7.49</p>
		<p><b>App Genre:</b> Game</p>
		<p><b>Description:</b> Minecraft is a sandbox video game with unlimited possibilities. Users can play in two different game modes: creative and survival. In creative, users are given unlimited resources to build of a world limited by only their imagination. In survial, users must mine the world for resources in order to create their world.</p>
		<p><b>Compatible Platforms:</b> iOS, Android</p>
		<p><b>Version:</b> 1.16.221</p>
		<p><b>Apple App Store Link:</b> <a href="https://apps.apple.com/us/app/minecraft/id479516143" target="_blank">Click here</a></p>
		<p><b>Google Play Store Link:  </b><a href="https://play.google.com/store/apps/details?id=com.mojang.minecraftpe" target="_blank">Click here</a></p>
        <br><br><br>
        <h3>Comments</h3>
	</div>

    <?php
    if(isset($_SESSION['useruid'])){
        $commentDb = 'minecraftComments';
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