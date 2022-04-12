<?php
session_start();

// $client_id = '0170386a16fc48d78411d539b152fe6f';
// $client_secret = 'c3ef16cb7d744b0ea7d2a733f7dbc144';
// $redirect_uri = 'https://web.ics.purdue.edu/~g1120478/callback.php';
$authorization_code = $_GET['code'];

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
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic MDE3MDM4NmExNmZjNDhkNzg0MTFkNTM5YjE1MmZlNmY6YzNlZjE2Y2I3ZDc0NGIwZWE3ZDJhNzMzZjdkYmMxNDQ=',
            'Content-Type: application/x-www-form-urlencoded'
        ));

/* set return type json */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
/* execute request */
$result = json_decode(curl_exec($ch));
echo $result->access_token;

/* close cURL resource */
curl_close($ch);

?>
