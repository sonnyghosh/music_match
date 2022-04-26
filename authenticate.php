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

// Check to see if the username and password fields have been filled out
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare statement to select information from Accounts table
if ($stmt = $con->prepare('SELECT id, password, auth FROM Accounts WHERE username = ?')) {
	// Bind the parameters to the ? marks. s for String, i for Int
	$stmt->bind_param('s', $_POST['username']);
	// Execute the sql statement
	$stmt->execute();
	// Store the results of the statement
	$stmt->store_result();
	//Check to see if username exists in database
	if ($stmt->num_rows > 0) {
		// bind the result to variables in php
		$stmt->bind_result($id, $password, $auth);
		$stmt->fetch();
		// Verify the password with that stored in database
		if (crypt($_POST['password'], $password) == $password) {
			// User has been successfully logged in!
			// Create session and set variables for the usernmae and id
			session_regenerate_id();
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;

			// Check if the user has been authenticated through Spotify yet
			if ($auth == 0) {
				// If not authenticated, send the user to the oAuth process
				header('Location: oauth.php');
			} else {
				// If the user has been authenticated through Spotify
				// set the user to logged in status and call a refresh for
				// the token
				$_SESSION['loggedin'] = TRUE;
				header('Location: refresh.php');
			}
		} else {
			// Incorrect password
			$message = 'Incorrect username and/or password!';
			echo "<script type='text/javascript'>alert('$message'); window.location.href='index.html';</script>";
		}
	} else {
		// Incorrect username
		$message = 'Incorrect username and/or password!';
		echo "<script type='text/javascript'>alert('$message'); window.location.href='index.html';</script>";
	}
	$stmt->close();
}

// Close the connection to the database
$con->close();
?>
