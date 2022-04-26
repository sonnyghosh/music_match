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
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['currentPassword'], $_POST['newPassword'], $_POST['confirmPassword'])) {
	// Present error messgae if the fields were not filled out
  $message = 'Please fill out all required fields';
  echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
  return false;
}

if (empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword'])) {
	// Check to make sure there are no empty values
  $message = 'Please fill out all required fields';
  echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
  return false;
}

// Get variables from change password form
$current_password = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Prepare statement to select information from Accounts table
if ($stmt = $con->prepare('SELECT id, password FROM Accounts WHERE username = ?')) {
	// Bind the parameters to the ? marks. s for String, i for Int
	$stmt->bind_param('s', $_SESSION['name']);
	// Execute the sql statement
	$stmt->execute();
	// Store the results of the statement
	$stmt->store_result();
	//Check to see if username exists in database
	if ($stmt->num_rows > 0) {
		// bind the result to variables in php
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		// Verify the password with that stored in database
		if (crypt($current_password, $password) == $password) {
      // Verify that the new password and confirmation password are the same
      if (strcmp($newPassword, $confirmPassword) != 0) {
        $message = 'Confirmation password does not match new password';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
				return false;
      }
      // Verify that the password only contains letters and numbers
      if (preg_match('/^[a-zA-Z0-9]+$/', $newPassword) == 0) {
				$message = 'Password can only contain letters and numbers!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
				return false;
			}
      // Verify that the password is between 5 and 20 characters
			if (strlen($newPassword) > 20 || strlen($newPassword) < 5) {
				// Show error messgae if password is not valid
				$message = 'Password must be between 5 and 20 characters long!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
				return false;
			}
      $stmt->close();
      // Prepare a new SQL statement to update the password and prevent SQL injection
      if ($stmt = $con->prepare('UPDATE Accounts SET password = ? WHERE id = ?')) {
      	$id = $_SESSION['id'];
        // Hash the password
        $salt = uniqid(mt_rand(), true);;
				$password = crypt($newPassword, $salt);
        $stmt->bind_param('si', $password, $id);
        // Insert the password into the table
      	$stmt->execute();
      	$stmt->close();
        $con -> close();
        $message = 'Password successfully changed!';
        echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
      }
    } else {
      // Incorrect password entered
      $message = 'Incorrect password!';
      echo "<script type='text/javascript'>alert('$message'); window.location.href='Profile.php';</script>";
    }
    $stmt-> close();
    $con -> close();
  }
}
?>
