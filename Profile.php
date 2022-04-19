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
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM Accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<!-- title to show on tabs -->
<title>Music Match | Profile</title>

<!-- formatting for every device -->
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- link to add icons -->
<script src="https://kit.fontawesome.com/01e2075c0e.js" crossorigin="anonymous"></script>

<!-- link to css script -->
<link href="style.css" rel="stylesheet">

</head>

<body class="loggedin">

<!-- nav bar code !-->
	<nav class="nav-bar" id="navbar">
	      <a href="Home.php"><img src="logo.png" width="50" height="50"></a>
	      <a href="Create.php"><i class="fa-solid fa-compass"></i> Create</a>
	      <a href="User.php"><i class="fa-solid fa-square-poll-vertical"></i> User Stats</a>
	      <a href="PlaylistPage.php"><i class="fa-solid fa-music"></i> Playlists</a>
	      <a href="Profile.php"><i class="fa-solid fa-user"></i> Profile</a>
	      <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
				<div class="searchbar">
	      <input type="text" placeholder="Search...">
			</div>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<i class="fa fa-bars"></i></a>
	</nav>

<!-- displaying profile info entered at registration !-->
<div class="profileinfo-profile">
  <p><b>Your account details are below:</b></p>
  <ul style="color: white">
      <li><b>Username:</b> <?=$_SESSION['name']?></li>
      <li><b>Password:</b> <?=$password?></li>
      <li><b>Email:</b> <?=$email?></li>
  </ul>
</div>

<!-- form to manage account !-->
      <form action="/action_page.php" class="form-container-profile">

          <label for="username" style="color: white"><b>New Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" optional>

          <label for="email" style="color: white"><b>Change Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" optional>

          <label for="oldpswd" style="color: white"><b>Old Password</b></label>
          <input type="text" placeholder="Enter Old Password" name="oldpswd" optional>

          <label for="newpswd" style="color: white"><b>New Password</b></label>
          <input type="text" placeholder="Enter New Password" name="newpswd" optional>

          <label for="confirmpswd" style="color: white"><b>Confirm Password</b></label>
          <input type="text" placeholder="Re-Enter Password" name="confirmpswd" optional>

          <button type="submit" class="btn">Confirm Changes</button>

      </form>

<!-- button to delete account !-->
<button type="button" class="open-delete-profile" onclick="openFormDelete()">Delete Account</button>

<!-- warning when deleting account !-->
<div class="form-popup-profile" id="deleteaccount">
	<form action="/action_page.php" class="form-container-profile animate">
	<div class="delete-content">
	  <h1>Are you sure you want to delete your account?</h1>
	  <p style="color: white">Warning: All information will be lost and canot be retained. This includes all playlists created and user stats such as top artists, genres, and songs.</p>
</div>
	<div class="buttons">
		<button type="button" class="cancelbtn" onclick="closeFormDelete()">Cancel</button>
		<button type="button" class="deletebtn">Delete Account Data</button>
 </div>
</form>

</div>



<script>
//nav bar responsiveness function
function myFunction() {
  var x = document.getElementById("navbar");
  if (x.className === "nav-bar") {
    x.className += " responsive";
  } else {
    x.className = "nav-bar";
  }
}

//open delete form/warning
function openFormDelete() {
  document.getElementById("deleteaccount").style.display = "block";
}

//close delete form/warning
function closeFormDelete() {
  document.getElementById("deleteaccount").style.display = "none";
}


</script>
</body>

</html>
