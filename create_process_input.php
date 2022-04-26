<?php

// Start the session
session_start();

// If the user is not logged in, redirect them to login page
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// Connect to database
$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';

// Exit if database connection has failed
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Get artists and genres from playlist form
$imploded_artists = implode(",", $_POST["artists"]);
$imploded_genres = implode(",", $_POST["genres"]);

// Prepare insert statement into playlist request by form table
if ($stmt = $con->prepare('INSERT INTO Playlist_Request_By_Form (user_id, genre, artist, num_songs, mood, mood_intensity) VALUES (?, ?, ?, ?, ? ,?)')) {
	$stmt->bind_param('issisi', $_SESSION['id'], $imploded_genres, $imploded_artists, $_POST["length"], $_POST['mood'], $_POST["intensity"]);
	$stmt->execute();
	$stmt->close();
	$con->close();
	// Redirect user to PlaylistPage if insert statement is successful
	header('Location: PlaylistPage.php');
} else {
	// If something is wrong, display error message
	echo 'Could not prepare statement!';
}
$stmt->close();
$con->close();

?>
