<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<!-- title to show on tabs -->
<title>Music Match | User Stats</title>
<link rel="icon" href="logo.png">

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

<!-- user info !-->
<div class="userinfo-user">
  <h1>Name</h1>
  <p>Hometown</p>
  <p>Member Since...</p>
</div>

<div class=row-user>

<!-- user stats !-->
<div class="column-user">
<h1>Top Genres</h1>
  <ol type="1">
      <li>Genre 1</li>
      <li>Genre 2</li>
      <li>Genre 3</li>
      <li>Genre 4</li>
      <li>Genre 5</li>
    </ol>
</div>

<div class="column-user">
<h1>Top Artists</h1>
  <ol type="1">
      <li>Artist 1</li>
      <li>Artist 2</li>
      <li>Artist 3</li>
      <li>Artist 4</li>
      <li>Artist 5</li>
    </ol>
</div>

<div class="column-user">
<h1>Top Songs</h1>
  <ol type="1">
      <li>Song 1</li>
      <li>Song 2</li>
      <li>Song 3</li>
      <li>Song 4</li>
      <li>Song 5</li>
</div>

</div>

<script>
//nav bar responsiveness
function myFunction() {
  var x = document.getElementById("navbar");
  if (x.className === "nav-bar") {
    x.className += " responsive";
  } else {
    x.className = "nav-bar";
  }
}
</script>

</body>

</html>
