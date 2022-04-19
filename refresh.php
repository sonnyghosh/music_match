<?php
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
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ($stmt = $con->prepare('SELECT refresh FROM Tokens WHERE user_id = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_SESSION['id']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($refresh_token);
		$stmt->fetch();
  }
  $stmt->close();
}

$url = 'https://accounts.spotify.com/api/token';

$ch = curl_init($url);

$data = ['grant_type'=>'refresh_token',
'refresh_token'=>$refresh_token];

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ZDUwYjgyYzhhYWRmNDdmNThlMjgyNzc0NGNmZmYwZmM6ZTEzNzM5MGExZWU2NGQwOTg4OTVmMTdmYmJkYjAwY2Q=',
            'Content-Type: application/x-www-form-urlencoded'
        ));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);

$result = json_decode(curl_exec($ch));
$_SESSION['access'] = $result->access_token;

if ($stmt = $con->prepare('UPDATE Tokens SET access = ? WHERE user_id = ?')) {
	$id = $_SESSION['id'];
	$_SESSION['access'] = $result->access_token;
  $stmt->bind_param('si', $_SESSION['access'], $id);
	$stmt->execute();
	$stmt->close();
}
$con->close();
curl_close($ch);
header('Location: Home.php')
?>
