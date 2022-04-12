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
$stmt = $con->prepare('SELECT id FROM accounts WHERE username = ?');
// In this case we can use the account ID to get the account info.
$username = 'Kate';
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($id);
$stmt->fetch();
$stmt->close();
echo $id;
//echo $password;
?>
