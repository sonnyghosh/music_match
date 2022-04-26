<?php

// Start the session
session_start();

// If the user has not authenticated their account, redirect to login page
if (empty($_SESSION['access'])) {
  header('Location: index.html');
  exit;
}

//Connect to database
$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';

// Exit if database connection has failed
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Prepare end execute insertion statement
if ($stmt = $con->prepare('INSERT INTO Tokens (user_id, access, refresh) VALUES (?, ?, ?)')) {
	$id = $_SESSION['id'];
	$access = $_SESSION['access'];
	$refresh = $_SESSION['refresh'];
	$stmt->bind_param('iss', $id, $access, $refresh);
	$stmt->execute();
	$stmt->close();
}

// Prepare and execute update statement
if ($stmt = $con->prepare('UPDATE Accounts SET auth = ? WHERE id = ?')) {
	$authorization = 1;
	$id = $_SESSION['id'];
  $stmt->bind_param('ii', $authorization, $id);
	// $stmt->bind_param('ii', $authorization, $_SESSION['id']);
	$stmt->execute();
	$stmt->close();
}

// Close the connection to the database
$con->close();

// Set the user to logged in status
$_SESSION['loggedin'] = TRUE;

//redirect the user to the home page
header('Location: Home.php')
?>
