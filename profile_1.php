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
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
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
<link href="style_1.css" rel="stylesheet">

</head>

<body class="loggedin">

<nav class="nav-bar">
  <div class="logo">
      <a href="Home_1.php"><img src="logo.png" width="50" height="50"></a>
  </div>
    <ul>
      <li><a href="#"><i class="fa-solid fa-compass"></i> Explore</a></li>
      <li><a href="User_1.php"><i class="fa-solid fa-square-poll-vertical"></i> User Stats</a></li>
      <li><a href="PlaylistPage_1.php"><i class="fa-solid fa-music"></i> Playlists</a></li>
      <li><a href="profile_1.php"><i class="fa-solid fa-user"></i> Profile</a></li>
      <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      <li class="searchbar">
         <input type="text" placeholder="Search..">
      </li>
    </ul>
  </div>
</nav>

<div class="profileinfo-profile">
  <p>Your account details are below:</p>
  <table style="color: white">
    <tr>
      <td>Username:</td>
      <td><?=$_SESSION['name']?></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><?=$password?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?=$email?></td>
    </tr>
  </table>
</div>

<button class="open-button-profile" onclick="openForm()">Manage User Acount</button>

<div class="form-popup-profile" id="editinfo">
      <form action="/action_page.php" class="form-container-profile animate">

          <label for="username"><b>New Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" optional>
 
          <label for="email"><b>Change Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" optional>

          <label for="oldpswd"><b>Old Password</b></label>
          <input type="text" placeholder="Enter Old Password" name="oldpswd" optional>

          <label for="newpswd"><b>New Password</b></label>
          <input type="text" placeholder="Enter New Password" name="newpswd" optional>

          <label for="confirmpswd"><b>Confirm Password</b></label>
          <input type="text" placeholder="Re-Enter Password" name="confirmpswd" optional>

          <button type="submit" class="btn">Confirm Changes</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          <button type="button" class="btn delete">Delete Account Data</button>
         </form>
       </div>

<script>
function openForm() {
  document.getElementById("editinfo").style.display = "block";
}

function closeForm() {
  document.getElementById("editinfo").style.display = "none";
}
</script>
</body>

</html>