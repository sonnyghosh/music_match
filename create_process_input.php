<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



$imploded_artists = implode(",", $_POST["artists"]);
$imploded_genres = implode(",", $_POST["genres"]);

if ($stmt = $con->prepare('INSERT INTO Playlist_Request_By_Form (user_id, genre, artist, num_songs, mood, mood_intensity) VALUES (?, ?, ?, ?, ? ,?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('issisi', $_SESSION['id'], $imploded_genres, $imploded_artists, $_POST["length"], $_POST['mood'], $_POST["intensity"]);
	$stmt->execute();

	echo "Done";
	header('Location: PlaylistPage.php');
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$stmt->close();
$con->close();

?>
