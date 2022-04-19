<?php
session_start();
if (empty($_SESSION['name'])) {
  header('Location: index.html');
  exit;
}
$client_id = 'd50b82c8aadf47f58e2827744cfff0fc';
$client_secret = 'e137390a1ee64d098895f17fbbdb00cd';
$redirect_uri = 'https://web.ics.purdue.edu/~g1120478/callback.php';


$state = bin2hex("385e33f741");
//echo $state;
$options = [
    'scope' => [
        'ugc-image-upload',
        'user-modify-playback-state',
        'user-read-playback-state',
        'user-read-currently-playing',
        'user-follow-modify',
        'user-follow-read',
        'user-read-recently-played',
        'user-read-playback-position',
        'user-top-read',
        'playlist-read-collaborative',
        'playlist-modify-public',
        'playlist-read-private',
        'playlist-modify-private',
        'app-remote-control',
        'streaming',
        'user-read-email',
        'user-read-private',
        'user-library-modify',
        'user-library-read',
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
    'scope' => 'ugc-image-upload user-modify-playback-state user-read-playback-state user-read-currently-playing user-follow-modify user-follow-read user-read-recently-played user-read-playback-position user-top-read playlist-read-collaborative playlist-modify-public playlist-read-private playlist-modify-private app-remote-control streaming user-read-email user-read-private user-library-modify user-library-read',
    'state' => '33383565333366373431',
  ];
  return http_build_query($parameters, '', '&');
}

?>
