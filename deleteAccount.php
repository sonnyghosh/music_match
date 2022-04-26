<?php

// Start the session
session_start();
// Connect to database
$DATABASE_HOST = 'mydb.itap.purdue.edu';
$DATABASE_USER = 'g1120478';
$DATABASE_PASS = 'Bean123.';
$DATABASE_NAME = 'g1120478';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Exit if database connection has failed
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ($stmt = $con->prepare('DELETE FROM Accounts WHERE username = ?')) {
	// Bind the parameters to the ? marks. s for String, i for Int
  echo "Bingus";
	$stmt->bind_param('s', $_SESSION['name']);
	// Execute the sql statement
	$stmt->execute();
  $stmt->close();
	$message = 'Account successfully deleted';
  echo "<script type='text/javascript'>alert('$message'); window.location.href='logout.php';</script>";
  return false;
} else {
	echo "Failed to prepare SQL statement";
}

?>
