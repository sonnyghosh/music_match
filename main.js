/*
    Remember to comment out this line when deploying the app
*/
//const SpotifyWebApi = require("./SpotifyAPI");
//This line enables type checing for this file to make it safer to write for
//@ts-check

var s = new SpotifyWebApi();

s.getAudioFeaturesForTrack("269f78ac78ae4289",
(a0,a1)=>{
    console.log(a0,a1)
})

//scp ./* g1120478@mace.itap.purdue.edu:/www