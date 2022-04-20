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
<link rel="icon" href="logo.png">

<!-- formatting for every device -->
<meta charset="utf-8"
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- link to add icons -->
<script src="https://kit.fontawesome.com/01e2075c0e.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- link to css script -->
<link href="style.css" rel="stylesheet">

<!-- search bar script -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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


<!-- form to submit music preferences !-->
<form action="create_process_input.php" class="form-container-create" method = "post" style="margin-top: 100px;">
    <h1 style="color: white">Create a playlist for you!</h1>

<!-- genre section of form !-->
		<div class="genre">

    <label for="genre" style="color: white;"><b>Favorite Genres?</b>

		<select class="js-genre-basic-multiple" name="genres[]" multiple="multiple" style:"color: black, width: 100%" required>
			<option value="acoustic">acoustic</option><option value="afrobeat">afrobeat</option><option value="alt-rock">alt-rock</option>
			<option value="alternative">alternative</option><option value="ambient">ambient</option><option value="anime">anime</option>

			<option value="black-metal">black-metal</option><option value="bluegrass">bluegrass</option><option value="blues">blues</option>
			<option value="bossanova">bossanova</option><option value="brazil">brazil</option><option value="breakbeat">breakbeat</option>
			<option value="british">british</option>

			<option value="cantopop">cantopop</option><option value="chicago-house">chicago-house</option><option value="children">children</option>
			<option value="chill">chill</option><option value="classical">classical</option><option value="club">club</option><option value="comedy">comedy</option>
			<option value="country">country</option>

			<option value="dance">dance</option><option value="dancehall">dancehall</option><option value="death-metal">death-metal</option>
			<option value="deep-house">deep-house</option><option value="detroit-techno">detroit-techno</option><option value="disco">disco</option>
			<option value="disney">disney</option><option value="drum-and-bass">drum-and-bass</option><option value="dub">dub</option>
			<option value="dubstep">dubstep</option>

			<option value="edm">edm</option><option value="electro">electro</option><option value="electronic">electronic</option>
			<option value="emo">emo</option>

			<option value="folk">folk</option><option value="forro">forro</option><option value="french">french</option>
			<option value="funk">funk</option>

			<option value="garage">garage</option><option value="german">german</option><option value="gospel">gospel</option>
			<option value="goth">goth</option><option value="grindcore">grindcore</option><option value="groove">groove</option>
			<option value="grunge">grunge</option><option value="guitar">guitar</option>

			<option value="happy">happy</option><option value="hard-rock">hard-rock</option><option value="hardcore">hardcore</option>
			<option value="hardstyle">hardstyle</option><option value="heavy-metal">heavy-metal</option><option value="hip-hop">hip-hop</option>
			<option value="holidays">holidays</option><option value="honky-tonk">honky-tonk</option><option value="house">house</option>

			<option value="idm">idm</option><option value="indian">indian</option><option value="indie">indie</option>
			<option value="indie-pop">indie-pop</option><option value="industrial">industrial</option><option value="iranian">iranian</option>

			<option value="j-dance">j-dance</option><option value="j-idol">j-idol</option><option value="j-pop">j-pop</option>
			<option value="j-rock">j-rock</option><option value="jazz">jazz</option>

			<option value="k-pop">k-pop</option><option value="kids">kids</option>

			<option value="latin">latin</option><option value="latino">latino</option>

			<option value="malay">malay</option><option value="mandopop">mandopop</option><option value="metal">metal</option>
			<option value="metal-misc">metal-misc</option><option value="metalcore">metalcore</option><option value="minimal-techno">minimal-techno</option>
			<option value="movies">movies</option><option value="mpb">mpb</option>

			<option value="new-age">new-age</option><option value="new-release">new-release</option>

			<option value="opera">opera</option>

			<option value="pagode">pagode</option><option value="party">party</option><option value="philippines-opm">philippines-opm</option>
			<option value="piano">piano</option><option value="pop">pop</option><option value="pop-film">pop-film</option>
			<option value="post-dubstep">post-dubstep</option><option value="power-pop">power-pop</option><option value="progressive-house">progressive-house</option>
			<option value="psych-rock">psych-rock</option><option value="punk">punk</option><option value="punk-rock">punk-rock</option>

			<option value="r-n-b">r-n-b</option><option value="rainy-day">rainy-day</option><option value="reggae">reggae</option>
			<option value="reggaeton">reaggaeton</option><option value="road-trip">road-trip</option><option value="rock">rock</option>
			<option value="rock-n-roll">rock-n-roll</option><option value="rockabilly">rockabilly</option><option value="romance">romance</option>

			<option value="sad">sad</option><option value="salsa">salsa</option><option value="samba">samba</option>
			<option value="sertanejo">setanejo</option><option value="show-tunes">show-tunes</option><option value="singer-songwriter">singer-songwriter</option>
			<option value="ska">ska</option><option value="sleep">sleep</option><option value="songwriter">songwriter</option>
			<option value="soul">soul</option><option value="soundtracks">soundtracks</option><option value="spanish">spanish</option>
			<option value="study">study</option><option value="summer">summer</option><option value="swedish">swedish</option>
			<option value="synth-pop">synth-pop</option>

			<option value="tango">tango</option><option value="techno">techno</option><option value="trance">trance</option>
			<option value="trip-hop">trip-hop</option><option value="turkish">turkish</option>

			<option value="work-out">work-out</option><option value="world-music">world-music</option>
		</select>
	</div>

	</label>
	<br />
  <br />

<!-- artist section of form !-->
      <label for="artist" style="color: white;"><b>Favorite Artists?</b>
				<select class="js-artist-basic-multiple" name="artists[]" multiple="multiple" style:"width: 100%, padding-bottom: 20px;"></select>
			</label>
			<br />
      <br />

<!-- song length section of form !-->
      <label for="length" style="color: white;"><b>How many songs would you like on the playlist?</b>
			<div class="slidecontainer-length">
				<input type="range" min="1" max="99" value="50" class="sliderlength" id="myRange-length" name="length" required>
				<p>Number of Songs: <span id="demo-length"></span></p>
			</div>
			</label>
			<br />

<!-- mood section for fprm !-->
      <label for="mood" style="color: white;"><b>What mood are you in right now?</b>
      <select name="mood" id="mood" required>
        <optgroup label="Mood">
          <option value="happy">Happy</option>
          <option value="sad">Sad</option>
          <option value="angry">Angry</option>
          <option value="love">Love</option>
          <option value="excited">Excited</option>
          <option value="calm">Calm</option>
        </optgroup>
     </select>
		 </label>
		 <br />
     <br />

        <label for="moodrange" style="color: white;"><b>Intensity of Mood (between 0 and 10):</b>
				<div class="slidecontainer-mood">
          <input type="range" min="0" max="10" value="5" class="slidermood" id="myRange-mood" name="intensity" required>
          <p>Value: <span id="demo-mood"></span></p>
        </div>
				</label>
				<br />
	      <br />

<!-- submit form !-->
        <button type="submit" class="btn">Submit</button>

</form>


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

//displayying slider value (mood)
var slidermood = document.getElementById("myRange-mood");
var outputmood = document.getElementById("demo-mood");
outputmood.innerHTML = slidermood.value;

slidermood.oninput = function() {
  outputmood.innerHTML = this.value;
}

//displaying slider value (length)
var sliderlength = document.getElementById("myRange-length");
var outputlength = document.getElementById("demo-length");
outputlength.innerHTML = sliderlength.value;

sliderlength.oninput = function() {
  outputlength.innerHTML = this.value;
}

//search/filter dropdown (genre)
$(document).ready(function() {
    $('.js-genre-basic-multiple').select2({
			placeholder: "Select Preferred Genres (Press Enter/Click on Option to Select)",
			theme: "classic",
			width: '100%'
		});
});

//search/filter dropdown (artist)
$('.js-artist-basic-multiple').select2({
	tags: true,
	placeholder: "Select Preferred Artists (Press Enter to Select)",
	theme: "classic",
	width: '100%',
	"language": {
       "noResults": function(){
           return "Enter Artist Names (FirstName LastName)";
       }
   },
    escapeMarkup: function (markup) {
        return markup;
    }
});

function dropDown() {
  document.getElementById("mood").classList.toggle("show");
}

function disable() {
  document.getElementById("myRange-mood").disabled = true;
	document.getElementById("mood").disabled = true;
}

function enable() {
	document.getElementById("mood").disabled = false;
}

</script>
</body>
</html>
