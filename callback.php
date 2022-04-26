<?php

// Start the session
session_start();

// Get the authorization code generated through oAuth process
$authorization_code = $_GET['code'];

// If no code has been generated, send the user back to login page
if (empty($authorization_code)) {
  header('Location: index.html');
  exit;
}

// Set value of url needed in curl request
$url = 'https://accounts.spotify.com/api/token';

// begin curl request
$ch = curl_init($url);

// Set data for curl request
$data = ['grant_type'=>'authorization_code',
'code'=>$authorization_code,
'redirect_uri'=>'https://web.ics.purdue.edu/~g1120478/callback.php'];

// Set post fields for curl request
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Build the required POST headers per Spotify API authorization flow
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ZDUwYjgyYzhhYWRmNDdmNThlMjgyNzc0NGNmZmYwZmM6ZTEzNzM5MGExZWU2NGQwOTg4OTVmMTdmYmJkYjAwY2Q=',
            'Content-Type: application/x-www-form-urlencoded'
        ));

// Set options for the curl request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);

// Execute the request and decode the json object
$result = json_decode(curl_exec($ch));

// Set the values of the session variables access and refresh
$_SESSION['access'] = $result->access_token;
$_SESSION['refresh'] = $result->refresh_token;

// Close curl resource
curl_close($ch);

// Send the user to the addAuthSQL.php script
header('Location: addAuthSQL.php');
?>
