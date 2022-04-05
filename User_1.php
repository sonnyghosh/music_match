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

<!-- formatting for every device -->
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- link to add icons -->
<script src="https://kit.fontawesome.com/01e2075c0e.js" crossorigin="anonymous"></script>

<!-- link to css script -->
<link href="style_1.css" rel="stylesheet">

</head>

<body class="loggedin">

<div class="nav-bar">
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

<div class="userinfo-user">
  <h1>Name</h1>
  <p>Hometown</p>
  <p>Member Since...</p>
</div><br>

<div class=row-user>

<div class="firstcolumn-user">
<div class="topgenres-user">
<h1>Top Genres</h1>
  <ol type="1">
      <li>Genre 1</li>
      <li>Genre 2</li>
      <li>Genre 3</li>
      <li>Genre 4</li>
      <li>Genre 5</li>
      <li>Genre 6</li>
    </ol>
</div>
</div>

<div class="secondcolumn-user">
<div class="topartists-user">
<h1>Top Artists</h1>
  <ol type="1">
      <li>Artist 1</li>
      <li>Artist 2</li>
      <li>Artist 3</li>
      <li>Artist 4</li>
      <li>Artist 5</li>
      <li>Artist 6</li>
    </ol>
</div><
</div>

<div class="thirdcolumn-user">
<div class="topsongs-user">
<h1>Top Songs</h1>
  <ol type="1">
      <li>Song 1</li>
      <li>Song 2</li>
      <li>Song 3</li>
      <li>Song 4</li>
      <li>Song 5</li>
      <li>Song 6</li>
    </ol>
</div>
</div>


</body>

</html>