<?php
    // Spotify App Page
    // Kamil Sacha
    // Last Update: April 26, 2021
    
    session_start();
    include 'dbh.inc.php';
    include_once 'header.php';
    include 'comments.inc.php';
    $tz = date_default_timezone_get();
    date_default_timezone_set('America/New_York');
?>
	<div id="appVisual">
		<img src="SpotifyLogo.png" alt="Spotify Logo" id="logo"></img>
		<h3>Spotify</h3>
	</div>

	<div id="appInfo">
		<h3>App Info</h3>
		<p><b>Creator:</b> Spotify Ltd.</p>
		<p><b>Price:</b> Free</p>
		<p><b>App Genre:</b> Music</p>
		<p><b>Description:</b> Spotify is one of the most popular music streaming applications in the world. Users can listen to over 70 million songs and hundreds of thousands of podcasts on the app. Users can listen to music for free in a shuffle mode or upgrade to a premium subscription where they can play any song, avoid ads, listen offline, and enjoy better sound quality.</p>
		<p><b>Compatible Platforms:</b> iOS, Android</p>
		<p><b>Version:</b> 8.6.20</p>
		<p><b>Apple App Store Link:</b> <a href="https://apps.apple.com/us/app/spotify-discover-new-music/id324684580" target="_blank">Click here</a></p>
		<p><b>Google Play Store Link:  </b><a href="https://play.google.com/store/apps/details?id=com.spotify.music" target="_blank">Click here</a></p>
        <br><br><br>
        <h3>Comments</h3>
	</div>

<?php
    $commentDb = 'spotifyComments';
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