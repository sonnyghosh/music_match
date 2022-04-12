<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location: index.html');
// 	exit;
// }

$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.

if ($stmt = $con->prepare('INSERT INTO Tokens (user_id, access, refresh) VALUES (?, ?, ?)')) {
	// $stmt->bind_param('iss', $_SESSION['id'], $_SESSION['access_token'], $_SESSION['refresh_token']);
	$id = $_SESSION['id'];
	$access = $_SESSION['access'];
	$refresh = $_SESSION['refresh'];
	$stmt->bind_param('iss', $id, $access, $refresh);
	$stmt->execute();
	$stmt->close();
}

if ($stmt = $con->prepare('UPDATE accounts SET auth = ? WHERE id = ?')) {
	$authorization = 1;
	$id = $_SESSION['id'];
  $stmt->bind_param('ii', $authorization, $id);
	// $stmt->bind_param('ii', $authorization, $_SESSION['id']);
	$stmt->execute();
	$stmt->close();
}
$con->close();

$_SESSION['loggedin'] = TRUE;
header('Location: Home_1.php')
?>
