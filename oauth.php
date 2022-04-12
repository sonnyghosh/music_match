<?php
session_start();

$client_id = '0170386a16fc48d78411d539b152fe6f';
$client_secret = 'c3ef16cb7d744b0ea7d2a733f7dbc144';
$redirect_uri = 'https://web.ics.purdue.edu/~g1120478/callback.php';


$state = bin2hex("385e33f741");
//echo $state;
$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
    ],
    'state' => $state,
];

echo "Hello";
header('Location: https://accounts.spotify.com/en/authorize?' . getAuthorizeUrl($options));

function getAuthorizeUrl($options = []) {
  $options = (array) $options;
  $parameters = [
    'client_id' => '0170386a16fc48d78411d539b152fe6f',
    'redirect_uri' => 'https://web.ics.purdue.edu/~g1120478/callback.php',
    'response_type' => 'code',
    'scope' => 'playlist-read-private user-read-private',
    'state' => '33383565333366373431',
  ];
  return http_build_query($parameters, '', '&');
}

?>
