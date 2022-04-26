<?php

// Start/resume the session
session_start();

// If the user is not logged in, redirect them to the login page
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// Create database connection
$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';
// Try and connect using the info above
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Prepare the select statement to get refresh token
if ($stmt = $con->prepare('SELECT refresh FROM Tokens WHERE user_id = ?')) {
	$stmt->bind_param('s', $_SESSION['id']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($refresh_token);
		$stmt->fetch();
  }
  $stmt->close();
}

// Set url used in curl request
$url = 'https://accounts.spotify.com/api/token';
// Create curl request
$ch = curl_init($url);
// Set data used in curl request
$data = ['grant_type'=>'refresh_token',
'refresh_token'=>$refresh_token];
// Set options for curl request
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
// Build specific header for post request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ZDUwYjgyYzhhYWRmNDdmNThlMjgyNzc0NGNmZmYwZmM6ZTEzNzM5MGExZWU2NGQwOTg4OTVmMTdmYmJkYjAwY2Q=',
            'Content-Type: application/x-www-form-urlencoded'
        ));
// Set options for curl request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
// Store result from curl request and decode json object
$result = json_decode(curl_exec($ch));

// Set the session variable access to the refreshed access token
$_SESSION['access'] = $result->access_token;

// Update the access token in the table
if ($stmt = $con->prepare('UPDATE Tokens SET access = ? WHERE user_id = ?')) {
	$id = $_SESSION['id'];
	$_SESSION['access'] = $result->access_token;
  $stmt->bind_param('si', $_SESSION['access'], $id);
	$stmt->execute();
	$stmt->close();
}
// Close the connection to the database and curl
$con->close();
curl_close($ch);
// Redirect the user to the home page
header('Location: Home.php')
?>
