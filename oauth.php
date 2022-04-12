<?php
session_start();

$client_id = 'd50b82c8aadf47f58e2827744cfff0fc';
$client_secret = 'e137390a1ee64d098895f17fbbdb00cd';
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

header('Location: https://accounts.spotify.com/en/authorize?' . getAuthorizeUrl($options));

function getAuthorizeUrl($options = []) {
  $options = (array) $options;
  $parameters = [
    'client_id' => 'd50b82c8aadf47f58e2827744cfff0fc',
    'redirect_uri' => 'https://web.ics.purdue.edu/~g1120478/callback.php',
    'response_type' => 'code',
    'scope' => 'playlist-read-private user-read-private',
    'state' => '33383565333366373431',
  ];
  return http_build_query($parameters, '', '&');
}

?>
