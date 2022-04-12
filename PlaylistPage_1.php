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


<!-- title to show on page -->
<title>Music Match | My Playlists</title>

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

<div class="row-playlist">

  <div class="leftcolumn-playlist">
  <div class="toprow-playlist">

  <h1>Your Playlists</h1>

      <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
        <div class="fakecover"></div>
          <p><b> Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>
   </div><br>

   <div class="bottomrow-playlist">
   <h1>Auto-Generated Playlists</h1>
     <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>
  </div><br>

  </div>

	<div class="column-blank" id="blank"></div>
  <div class="rightcolumn-playlist" id="playlist_name" style="visibility:hidden">
    <div class="current-playlist">
      <div class="fakecovercurrent-playlist"></div>
      <p> Playlist</p>
      <h3> Playlist Name </h3>
      <p> Artist Name</p>
      <p> Created on "date"</p>
    </div>

    <div id="song" class="song-playlist" style="color: white"><p>song</p>
    </div>

	</div>

	<div class="rightcolumn-playlist" id="playlist_match_name" style="visibility:hidden">
    <div class="current-playlist">
      <div class="fakecovercurrent-playlist"></div>
      <p> Playlist</p>
      <h3> Playlist Name </h3>
      <p>by Music Match</p>
      <p> Created on "date"</p>
    </div>

    <div id="song" class="song-playlist-match" style="color: white">
			<p>song</p>
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

function multiplyNode(node, count, deep) {
    for (var i = 0, copy; i < count - 1; i++) {
        copy = node.cloneNode(deep);
        node.parentNode.insertBefore(copy, node);
    }
}

multiplyNode(document.querySelector('.song-playlist'), 10, true);

multiplyNode(document.querySelector('.song-playlist-match'), 10, true);

</script>

</body>

</html>
