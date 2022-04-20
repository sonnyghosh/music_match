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

<!-- row for playlist page (helps format) !-->
  <div class="row-playlist">

<!-- previews of playlists that are on website for user !-->
    <div class="leftcolumn-playlist">

<!-- user specific playlists from spotify !-->
	    <div class="toprow-playlist">
	         <h1>Your Playlists</h1>
           <div class="playlist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_name').innerHTML" style="cursor: pointer;">
                <div class="fakecover"></div>
                <p><b> Playlist Name</b> by Artist Name</p>
           </div>
     </div>

<!-- user generated playlists !-->
     <div class="bottomrow-playlist">
          <h1>Auto-Generated Playlists</h1>
          <div class="autoplaylist-playlist" onclick="document.getElementById('blank').innerHTML=document.getElementById('playlist_match_name').innerHTML" style="cursor: pointer;">
               <div class="fakecover"></div>
               <p><b>Playlist Name</b> by Music Match</p>
         </div>

    </div>

  </div>

<!-- blank right side of screen (playlists pop up on click of left side) !-->
  <div class="column-blank" id="blank"></div>

  <div class="rightcolumn-playlist" id="playlist_name" style="visibility:hidden">
<!-- current playlist clicked on (from your playlists)!-->
       <div class="current-playlist">
            <div class="fakecovercurrent-playlist" style="float: left; display: flex;"></div>
						<button type="button" class="history" style="float: right; display: flex; background-color: Crimson; vertical-align: middle; height: 30px;"><b>Generate New Playlist</b></button>
            <p> Playlist</p>
            <h3> Playlist Name </h3>
            <p> Artist Name</p>
            <p> Created on "date"</p>
      </div>

<!-- songs inlcluded on playlist (from your playlists)!-->
      <div class="song-playlist" style="color: white">
				   <div class="fakecover-song"></div>
			   	 <div class="songlength">
						    <p>time</p>
				   </div>
				   <div class="songinfo">
						    <p style="margin-bottom: 0"><b>Song Name</b></p>
						    <p style="margin-top: 0">Artist Name</p>
				   </div>
			</div>

	</div>

	<div class="rightcolumn-playlist" id="playlist_match_name" style="visibility:hidden">
	<!-- current playlist clicked on (from generated playlists) !-->
       <div class="current-playlist">
            <div class="fakecovercurrent-playlist"></div>
            <p> Playlist</p>
            <h3> Playlist Name </h3>
            <p>by Music Match</p>
            <p> Created on "date"</p>
       </div>

<!-- songs inlcluded on playlist (from generated playlists)!-->
       <div class="song-playlist-match" style="color: white">
				    <div class="fakecover-song"></div>
						<div class="songlength">
							   <p>time</p>
						</div>
						<div class="songinfo">
			           <p style="margin-bottom: 0"><b>Song Name</b></p>
						     <p style="margin-top: 0">Artist Name</p>
						</div>
       </div>

  </div>
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

//repeating divs function
function multiplyNode(node, count, deep) {
    for (var i = 0, copy; i < count - 1; i++) {
        copy = node.cloneNode(deep);
        node.parentNode.insertBefore(copy, node);
    }
}

//repeat songs for current your playlist
multiplyNode(document.querySelector('.song-playlist'), 20, true);

//repeat songs for current generated playlist
multiplyNode(document.querySelector('.song-playlist-match'), 20, true);

//repeat playlists on left side (your playlists)
multiplyNode(document.querySelector('.playlist-playlist'), 10, true);

//repeat playlists on left side (generated playlists)
multiplyNode(document.querySelector('.autoplaylist-playlist'), 5, true);

</script>

</body>

</html>
