<?php

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

// Check to see if username, password, and email fields were properly filled out
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Present error messgae if the fields were not fileld out
	exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// Check to make sure there are no empty values
	exit('Please complete the registration form');
}

// Prepare the insertion SQL statement
if ($stmt = $con->prepare('SELECT id, password FROM Accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		// If the username already exists show error message
		$message = 'Username exists, please choose another!';
		echo "<script type='text/javascript'>alert('$message'); window.location.href='Register.html';</script>";
		return false;
	} else {
		// If the username doesn't exist, continue the process to create a new account
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				// Show error message if email is not valid
				$message = 'Email is not valid!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Register.html';</script>";
				return false;
			}

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
				// Show error message if username is not valid
				$message = 'Username can only contain letters and numbers!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Register.html';</script>";
				return false;
			}

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) == 0) {
				// Show error message if username is not valid
				$message = 'Password can only contain letters and numbers!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Register.html';</script>";
				return false;
			}

			if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
				// Show error messgae if password is not valid
				$message = 'Password must be between 5 and 20 characters long!';
				echo "<script type='text/javascript'>alert('$message'); window.location.href='Register.html';</script>";
				return false;
			}

			if ($stmt = $con->prepare('INSERT INTO Accounts (username, password, email) VALUES (?, ?, ?)')) {
				// Salt the password
				$salt = uniqid(mt_rand(), true);;
				$password = crypt($_POST['password'], $salt);
				$stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
				// Execute the password insertion statement
				$stmt->execute();
				// Redirect the user to the logout page, and then therefore the login page
				$stmt->close();
				$con->close();
				header('Location: logout.php');
			} else {
				// Display error if unable to prepare SQL statement
					echo 'Could not prepare statement!';
			}
	}
	// Close prepared statement
	$stmt->close();
} else {
	// Display error if unable to prepare SQL statement
	echo 'Could not prepare statement!';
}

// Close the connection to the database
$con->close();
?>
