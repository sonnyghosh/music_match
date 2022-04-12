<?php
/* API URL */
$url = 'https://accounts.spotify.com/api/token';

/* Init cURL resource */
$ch = curl_init($url);

/* Array Parameter Data */
$data = ['grant_type'=>'authorization_code',
'code'=>'AQAzbHUGAPbMr7KejwA4Qqc7ZkxZEif_C0dV0VDUagFL4UwST8GzsGYiD7w5VJ25W5W1NloiXP1c9flYJterUTUH7JnyhKKWhGo-zLoZgQoShRy4P8wuIZr3XOkMEf-pwCD1I-KPMj8uEejXneCzopS9qoc7lVwlsxGf0u54uWDOefcdpISXkQ1KzDJL0dmyU5h_48YYFnlmOJu_sA5F5hhXNBXjE-rmtGY_iIY3mIGQPmxheiyaluEYcTJb59g',
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
