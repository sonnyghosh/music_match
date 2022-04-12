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
<title>Music Match</title>

<!-- formatting for every device -->
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- link to add icons -->
<script src="https://kit.fontawesome.com/01e2075c0e.js" crossorigin="anonymous"></script>

<!-- link to css script -->
<link href="style_1.css" rel="stylesheet">

</head>

<body class="loggedin">

<nav class="nav-bar" id="navbar">
      <a href="Home_1.php"><img src="logo.png" width="50" height="50"></a>
      <a href="Create_1.php"><i class="fa-solid fa-compass"></i> Create</a>
      <a href="User_1.php"><i class="fa-solid fa-square-poll-vertical"></i> User Stats</a>
      <a href="PlaylistPage_1.php"><i class="fa-solid fa-music"></i> Playlists</a>
      <a href="profile_1.php"><i class="fa-solid fa-user"></i> Profile</a>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
			<div class="searchbar">
        <input type="text" placeholder="Search...">
		  </div>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i></a>
</nav>

<div class="row-home">

  <div class="leftcolumn-home">

  <div class="user-home">
  <h1>User Stats</h1>
    <p>Name<p>
    <p>Hometown</p>
    <p>Member Since...</p>
    <br>
    <p>Top Genres</p>
    <ol type="1">
      <li>Genre 1</li>
      <li>Genre 2</li>
      <li>Genre 3</li>
    </ol>
    <a href="User_1.php">View More...</a>
    <p>Top Artists</p>
    <ol type="1">
      <li>Artist 1</li>
      <li>Artist 2</li>
      <li>Artist 3</li>
    </ol>
    <a href="User_1.php">View More...</a>
    <p>Top Songs</p>
    <ol type="1">
      <li>Song 1</li>
      <li>Song 2</li>
      <li>Song 3</li>
    </ol>
    <a href="User_1.php">View More...</a>
  </div>
  </div>

  <div class="rightcolumn-home">

    <div class="toprow-home">
    <h1>Your Playlists</h1>
      <div class="playlist-home">
        <div class="fakecover"></div>
          <p><b> Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-home">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-home">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

   <a href="PlaylistPage_1.php">View More...</a>

   </div><br>

   <div class="bottomrow-home">
   <h1>Auto-Generated Playlists</h1>
     <div class="playlist-home">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-home">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-home">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

   <a href="PlaylistPage_1.php">View More...</a>
   </div>

  </div>

</div>



<script>

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
