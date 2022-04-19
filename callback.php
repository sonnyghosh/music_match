<?php
session_start();

// $client_id = '0170386a16fc48d78411d539b152fe6f';
// $client_secret = 'c3ef16cb7d744b0ea7d2a733f7dbc144';
// $redirect_uri = 'https://web.ics.purdue.edu/~g1120478/callback.php';
$authorization_code = $_GET['code'];
if (empty($authorization_code)) {
  header('Location: index.html');
  exit;
}

$url = 'https://accounts.spotify.com/api/token';

/* Init cURL resource */
$ch = curl_init($url);

/* Array Parameter Data */
$data = ['grant_type'=>'authorization_code',
'code'=>$authorization_code,
'redirect_uri'=>'https://web.ics.purdue.edu/~g1120478/callback.php'];

/* pass encoded JSON string to the POST fields */
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

/* set the content type json */

// NEED TO CHANGE  64 ENCODE based on client id: client secret
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ZDUwYjgyYzhhYWRmNDdmNThlMjgyNzc0NGNmZmYwZmM6ZTEzNzM5MGExZWU2NGQwOTg4OTVmMTdmYmJkYjAwY2Q=',
            'Content-Type: application/x-www-form-urlencoded'
        ));

/* set return type json */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
/* execute request */
$result = json_decode(curl_exec($ch));

$_SESSION['access'] = $result->access_token;
$_SESSION['refresh'] = $result->refresh_token;

//Maybe add some error checking here to make sure that the access token and refresh token were actually received.

header('Location: addAuthSQL.php');
//echo $result;

/* close cURL resource */
curl_close($ch);

?>
