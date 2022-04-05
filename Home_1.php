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

  <button class="open-button-home" onclick="openForm()"><b>Tell us what you want to listen to!</b></button>
    <div class="form-popup-home" id="interestform">
      <form action="/action_page.php" class="form-container-home animate">

          <label for="genre"><b>What genres would you like included?</b></label>
          <input type="text" placeholder="Enter Preferred Genres" name="genre" required>
					<select name="genre" id="genre" multiple>
           <optgroup label="Genre">
            <option value="acoustic">acoustic</option><option value="afrobeat">afrobeat</option><option value="alt-rock">alt-rock</option><option value="alternative">alternative</option><option value="ambient">ambient</option><option value="anime">anime</option><option value="black-metal">black-metal</option>
						<option value="bluegrass">bluegrass</option><option value="blues">blues</option><option value="bossanova">bossanova</option><option value="brazil">brazil</option><option value="breakbeat">breakbeat</option><option value="british">british</option><option value="cantopop">cantopop</option>
						<option value="chicago-house">chicago-house</option><option value="children">children</option><option value="chill">chill</option><option value="classical">classical</option><option value="club">club</option><option value="comedy">comedy</option><option value="country">country</option>
						<option value="dance">dance</option><option value="dancehall">dancehall</option><option value="death-metal">death-metal</option>
						<option value="deep-house">deep-house</option><option value="detroit-techno">detroit-techno</option><option value="disco">disco</option>
            <option value="disney">disney</option>
						<option value="drum-and-bass">drum-and-bass</option>
						<option value="dub">dub</option>
						<option value="dubstep">dubstep</option>
            <option value="edm">edm</option>
            <option value="electro">electro</option>
            <option value="electronic">electronic</option>
						<option value="emo">emo</option>
						<option value="folk">folk</option>
						<option value="forro">forro</option>
            <option value="french">french</option>
            <option value="funk">funk</option>
            <option value="garage">garage</option>
						<option value="german">german</option>
						<option value="gospel">gospel</option>
						<option value="goth">goth</option>
            <option value="grindcore">grindcore</option>
            <option value="groove">groove</option>
            <option value="grunge">grunge</option>
						<option value="guitar">guitar</option>
						<option value="happy">happy</option>
						<option value="hard-rock">hard-rock</option>
            <option value="hardcore">hardcore</option>
            <option value="hardstyle">hardstyle</option>
            <option value="heavy-metal">heavy-metal</option>
						<option value="hip-hop">hip-hop</option>
						<option value="holidays">holidays</option>
						<option value="honky-tonk">honky-tonk</option>
            <option value="house">house</option>
            <option value="idm">idm</option>
            <option value="indian">indian</option>
						<option value="indie">indie</option>
						<option value="indie-pop">indie-pop</option>
						<option value="industrial">industrial</option>
            <option value="iranian">iranian</option>
            <option value="j-dance">j-dance</option>
            <option value="j-idol">j-idol</option>
						<option value="j-pop">j-pop</option>
						<option value="j-rock">j-rock</option>
           </optgroup>
          </select>


          <label for="artist"><b>Which artist's would you like included?</b></label>
          <input type="text" placeholder="Enter Preferred Artists" name="artist" required>

          <label for="length"><b>How many songs would you like on the playlist?</b></label>
          <input type="text" placeholder="Enter Preferred Playlist Length (in number of songs)" name="length" required>

          <label for="mood"><b>What mood are you in right now?</b></label>
          <select name="mood" id="mood">
           <optgroup label="Mood">
            <option value="happy">Happy</option>
            <option value="sad">Sad</option>
            <option value="angry">Angry</option>
            <option value="love">Love</option>
						<option value="excited">Excited</option>
						<option value="calm">Calm</option>
           </optgroup>
          </select>

          <label for="moodrange"><b>Intensity of Mood (between 0 and 10):</b></label>
          <input type="range" id="moodrange" name="moodrange" min="0" max="10">

          <button type="submit" class="btn">Sumbit</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
         </form>
       </div>

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
function openForm() {
  document.getElementById("interestform").style.display = "block";
}

function closeForm() {
  document.getElementById("interestform").style.display = "none";
}
</script>

</body>

</html>
