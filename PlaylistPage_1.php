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

<div class="row-playlist">

  <div class="leftcolumn-playlist">
  <div class="toprow-playlist">

  <h1>Your Playlists</h1>

      <div class="playlist-playlist">
        <div class="fakecover"></div>
          <p><b> Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>

      <div class="playlist-playlist">
        <div class="fakecover"></div>
        <p><b>Playlist Name</b> by Artist Name</p>
      </div><br>
   </div><br>

   <div class="bottomrow-playlist">
   <h1>Auto-Generated Playlists</h1>
     <div class="playlist-playlist">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>

     <div class="playlist-playlist">
       <div class="fakecover"></div>
       <p><b>Playlist Name</b> by Music Match</p>
     </div><br>
  </div><br>

  </div>

  <div class="rightcolumn-playlist">
    <div class="current-playlist">
      <div class="fakecovercurrent-playlist"></div>
      <p> Playlist</p>
      <h3> Playlist Name </h3>
      <p> Artist Name/Music Match </p>
      <p> Created on "date"</p>
    </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
        <p><b> SongName</b> ArtistName AlbumName Length</p>
       </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>

   <div class="song-playlist">
      <div class="fakecover"></div>
     <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
       </div>

    <div class="song-playlist">
      <div class="fakecover"></div>
      <p><b> SongName</b> ArtistName AlbumName Length</p>
    </div>


  </div>

</div>

</body>

</html>
