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
<title>Music Match | Create</title>

<!-- formatting for every device -->
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- link to add icons -->
<script src="https://kit.fontawesome.com/01e2075c0e.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

<div class="btn-group-create">

<button class="open-button-create" onclick="openForm()"><b>Tell us what you want to listen to!</b></button>

<div class="form-popup-create" id="interestform">
  <form action="/action_page.php" class="form-container-create animate">

      <label for="genre"><b>Which genre's would you like included?</b></label>

			<div class="multiselect">

        <div class="selectBox" onclick="showCheckboxes()">
          <select>
            <option>Select genres</option>
          </select>
            <div class="overSelect"></div>
       </div>

       <div id="checkboxes">
         <label><input type="checkbox"/>acoustic</label><label><input type="checkbox"/>afrobeat</label><label><input type="checkbox"/>alt-rock</label>
				 <label><input type="checkbox"/>alternative</label><label><input type="checkbox"/>ambient</label><label><input type="checkbox"/>anime</label>

				 <label><input type="checkbox"/>black-metal</label><label><input type="checkbox"/>bluegrass</label><label><input type="checkbox"/>blues</label>
				 <label><input type="checkbox"/>bossanova</label><label><input type="checkbox"/>brazil</label><label><input type="checkbox"/>breakbeat</label>
				 <label><input type="checkbox"/>british</label>

         <label><input type="checkbox"/>cantopop</label><label><input type="checkbox"/>chicago-house</label><label><input type="checkbox"/>children</label>
         <label><input type="checkbox"/>chill</label><label><input type="checkbox"/>classical</label><label><input type="checkbox"/>club</label>
         <label><input type="checkbox"/>comedy</label><label><input type="checkbox"/>country</label>

				 <label><input type="checkbox"/>dance</label><label><input type="checkbox"/>dancehall</label><label><input type="checkbox"/>death-metal</label>
				 <label><input type="checkbox"/>deep-house</label><label><input type="checkbox"/>detroit-techno</label><label><input type="checkbox"/>disco</label>
				 <label><input type="checkbox"/>disney</label><label><input type="checkbox"/>drum-and-bass</label><label><input type="checkbox"/>dub</label>
				 <label><input type="checkbox"/>dubstep</label>

         <label><input type="checkbox"/>edm</label><label><input type="checkbox"/>electro</label><label><input type="checkbox"/>electronic</label>
         <label><input type="checkbox"/>emo</label>

         <label><input type="checkbox"/>folk</label><label><input type="checkbox"/>forro</label><label><input type="checkbox"/>french</label>
				 <label><input type="checkbox"/>funk</label>

				 <label><input type="checkbox"/>garage</label><label><input type="checkbox"/>german</label><label><input type="checkbox"/>gospel</label>
				 <label><input type="checkbox"/>goth</label><label><input type="checkbox"/>grindcore</label><label><input type="checkbox"/>groove</label>
				 <label><input type="checkbox"/>grunge</label><label><input type="checkbox"/>guitar</label>

				 <label><input type="checkbox"/>happy</label><label><input type="checkbox"/>hard-rock</label><label><input type="checkbox"/>hardcore</label>
				 <label><input type="checkbox"/>hardstyle</label><label><input type="checkbox"/>heavy-metal</label><label><input type="checkbox"/>hip-hop</label>
				 <label><input type="checkbox"/>holidays</label><label><input type="checkbox"/>honky-tonk</label><label><input type="checkbox"/>house</label>

				 <label><input type="checkbox"/>idm</label><label><input type="checkbox"/>indian</label><label><input type="checkbox"/>indie</label>
				 <label><input type="checkbox"/>indie-pop</label><label><input type="checkbox"/>industrial</label><label><input type="checkbox"/>iranian</label>

				 <label><input type="checkbox"/>j-dance</label><label><input type="checkbox"/>j-pop</label><label><input type="checkbox"/>j-rock</label>
				 <label><input type="checkbox"/>jazz</label>

				 <label><input type="checkbox"/>k-pop</label><label><input type="checkbox"/>kids</label>

				 <label><input type="checkbox"/>latin</label><label><input type="checkbox"/>latino</label>

				 <label><input type="checkbox"/>malay</label><label><input type="checkbox"/>mandopop</label><label><input type="checkbox"/>metal</label>
				 <label><input type="checkbox"/>metal-misc</label><label><input type="checkbox"/>metalcore</label><label><input type="checkbox"/>minimal-techno</label>
				 <label><input type="checkbox"/>movies</label><label><input type="checkbox"/>mpb</label>

				 <label><input type="checkbox"/>new-age</label><label><input type="checkbox"/>new-release</label>

				 <label><input type="checkbox"/>opera</label>

				 <label><input type="checkbox"/>pagode</label><label><input type="checkbox"/>party</label><label><input type="checkbox"/>philippines-opm</label>
				 <label><input type="checkbox"/>piano</label><label><input type="checkbox"/>pop</label><label><input type="checkbox"/>pop-film</label>
				 <label><input type="checkbox"/>post-dubstep</label><label><input type="checkbox"/>power-pop</label><label><input type="checkbox"/>progressive-house</label>
				 <label><input type="checkbox"/>psych-rock</label><label><input type="checkbox"/>punk</label><label><input type="checkbox"/>punk-rock</label>

				 <label><input type="checkbox"/>r-n-b</label><label><input type="checkbox"/>rainy-day</label><label><input type="checkbox"/>reggae</label>
				 <label><input type="checkbox"/>reggaeton</label><label><input type="checkbox"/>road-trip</label><label><input type="checkbox"/>rock</label>
				 <label><input type="checkbox"/>rock-n-roll</label><label><input type="checkbox"/>rockabilly</label><label><input type="checkbox"/>romance</label>

				 <label><input type="checkbox"/>sad</label><label><input type="checkbox"/>salsa</label><label><input type="checkbox"/>samba</label>
				 <label><input type="checkbox"/>sertanejo</label><label><input type="checkbox"/>show-tunes</label><label><input type="checkbox"/>singer-songwriter</label>
				 <label><input type="checkbox"/>ska</label><label><input type="checkbox"/>sleep</label><label><input type="checkbox"/>songwriter</label>
				 <label><input type="checkbox"/>soul</label><label><input type="checkbox"/>soundtracks</label><label><input type="checkbox"/>spanish</label>
				 <label><input type="checkbox"/>study</label><label><input type="checkbox"/>summer</label><label><input type="checkbox"/>swedish</label>
				 <label><input type="checkbox"/>synth-pop</label>

				 <label><input type="checkbox"/>tango</label><label><input type="checkbox"/>techno</label><label><input type="checkbox"/>trance</label>
				 <label><input type="checkbox"/>trip-hop</label><label><input type="checkbox"/>turkish</label>

				 <label><input type="checkbox"/>work-out</label><label><input type="checkbox"/>world-music</label>

       </div>

     </div>


      <label for="artist"><b>Which artist's would you like included?</b></label>
      <input type="text" placeholder="Enter Preferred Artists" name="artist" required>

      <label for="length"><b>How many songs would you like on the playlist?</b></label>
			<div class="slidecontainer-length">
				<input type="range" min="1" max="99" value="50" class="sliderlength" id="myRange-length">
				<p>Number of Songs: <span id="demo-length"></span></p>
			</div>

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
				<div class="slidecontainer-mood">
          <input type="range" min="0" max="10" value="5" class="slidermood" id="myRange-mood">
          <p>Value: <span id="demo-mood"></span></p>
        </div>

        <button type="submit" class="btn">Sumbit</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

</form>
</div>

<button onclick="myFunctionDrop()" class="dropbtn"><b>Search Available Genres</b></button>
  <div id="myDropdown" class="dropdown-content">
  <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#acoustic">acoustic</a><a href="#afrobeat">afrobeat</a><a href="#alt-rock">alt-rock</a>
    <a href="#alternative">alternative</a><a href="#ambient">ambient</a><a href="#anime">anime</a>

		<a href="#black-metal">black-metal</a><a href="#bluegrass">bluegrass</a><a href="#blues">blues</a>
		<a href="#bossanova">bossanova</a><a href="#brazil">brazil</a><a href="#breakbeat">breakbeat</a>
		<a href="#british">british</a>

		<a href="#cantopop">cantopop</a><a href="#chicago-house">chicago-house</a><a href="#children">children</a>
		<a href="#chill">chill</a><a href="#classical">classical</a><a href="#club">club</a><a href="#comedy">comedy</a>
		<a href="#country">country</a>

		<a href="#dance">dance</a><a href="#dancehall">dancehall</a><a href="#death-metal">death-metal</a>
		<a href="#deep-house">deep-house</a><a href="#detroit-techno">detroit-techno</a><a href="#disco">disco</a>
		<a href="#disney">disney</a><a href="#drum-and-bass">drum-and-bass</a><a href="#dub">dub</a>
		<a href="#dubstep">dubstep</a>

		<a href="#edm">edm</a><a href="#electro">electro</a><a href="#electronic">electronic</a>
		<a href="#emo">emo</a>

		<a href="#folk">folk</a><a href="#forro">forro</a><a href="#french">french</a>
		<a href="#funk">funk</a>

		<a href="#garage">garage</a><a href="#german">german</a><a href="#gospel">gospel</a>
		<a href="#goth">goth</a><a href="#grindcore">grindcore</a><a href="#groove">groove</a>
    <a href="#grunge">grunge</a><a href="#guitar">guitar</a>

		<a href="#happy">happy</a><a href="#hard-rock">hard-rock</a><a href="#hardcore">hardcore</a>
		<a href="#hardstyle">hardstyle</a><a href="#heavy-metal">heavy-metal</a><a href="#hip-hop">hip-hop</a>
    <a href="#holidays">holidays</a><a href="#honky-tonk">honky-tonk</a><a href="#house">house</a>

		<a href="#idm">idm</a><a href="#indian">indian</a><a href="#indie">indie</a>
		<a href="#indie-pop">indie-pop</a><a href="#industrial">industrial</a><a href="#iranian">iranian</a>

		<a href="#j-dance">j-dance</a><a href="#j-idol">j-idol</a><a href="#j-pop">j-pop</a>
		<a href="#j-rock">j-rock</a><a href="#jazz">jazz</a>

		<a href="#k-pop">k-pop</a><a href="#kids">kids</a>

		<a href="#latin">latin</a><a href="#latino">latino</a>

		<a href="#malay">malay</a><a href="#mandopop">mandopop</a><a href="#metal">metal</a>
		<a href="#metal-misc">metal-misc</a><a href="#metalcore">metalcore</a><a href="#minimal-techno">minimal-techno</a>
		<a href="#movies">movies</a><a href="#mpb">mpb</a>

		<a href="#new-age">new-age</a><a href="#new-release">new-release</a>

		<a href="#opera">opera</a>

		<a href="#pagode">pagode</a><a href="#party">party</a><a href="#philippines-opm">philippines-opm</a>
		<a href="#piano">piano</a><a href="#pop">pop</a><a href="#pop-film">pop-film</a>
		<a href="#post-dubstep">post-dubstep</a><a href="#power-pop">power-pop</a><a href="#progressive-house">progressive-house</a>
		<a href="#psych-rock">psych-rock</a><a href="#punk">punk</a><a href="#punk-rock">punk-rock</a>

		<a href="#r-n-b">r-n-b</a><a href="#rainy-day">rainy-day</a><a href="#reggae">reggae</a>
		<a href="#reggaeton">reaggaeton</a><a href="#road-trip">road-trip</a><a href="#rock">rock</a>
		<a href="#rock-n-roll">rock-n-roll</a><a href="#rockabilly">rockabilly</a><a href="#romance">romance</a>

		<a href="#sad">sad</a><a href="#salsa">salsa</a><a href="#samba">samba</a>
		<a href="#sertanejo">setanejo</a><a href="#show-tunes">show-tunes</a><a href="#singer-songwriter">singer-songwriter</a>
		<a href="#ska">ska</a><a href="#sleep">sleep</a><a href="#songwriter">songwriter</a>
		<a href="#soul">soul</a><a href="#soundtracks">soundtracks</a><a href="#spanish">spanish</a>
		<a href="#study">study</a><a href="#summer">summer</a><a href="#swedish">swedish</a>
		<a href="#synth-pop">synth-pop</a>

		<a href="#tango">tango</a><a href="#techno">techno</a><a href="#trance">trance</a>
		<a href="#trip-hop">trip-hop</a><a href="#turkish">turkish</a>

		<a href="#work-out">work-out</a><a href="#world-music">world-music</a>
  </div>

</div>


<script>
function openForm() {
  document.getElementById("interestform").style.display = "block";
}

function closeForm() {
  document.getElementById("interestform").style.display = "none";
}

function myFunction() {
  var x = document.getElementById("navbar");
  if (x.className === "nav-bar") {
    x.className += " responsive";
  } else {
    x.className = "nav-bar";
  }
}

var slidermood = document.getElementById("myRange-mood");
var outputmood = document.getElementById("demo-mood");
outputmood.innerHTML = slidermood.value;

slidermood.oninput = function() {
  outputmood.innerHTML = this.value;
}

var sliderlength = document.getElementById("myRange-length");
var outputlength = document.getElementById("demo-length");
outputlength.innerHTML = sliderlength.value;

sliderlength.oninput = function() {
  outputlength.innerHTML = this.value;
}

function myFunctionDrop() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
</body>
</html>
