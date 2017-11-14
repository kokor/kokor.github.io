
<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('HTTP/1.1 400 Bad Request');
    exit;
}
session_start();


$url = 'https://fcm.googleapis.com/fcm/send';
$YOUR_API_KEY = 'AAAALZERK6E:APA91bH-0pawAXzzuKOuj3Fu9lnxsTe0ZItRTKW40l4ibfLmKA3Wvnm-S2t_fE4rPUkGlhXO775AAYkLi0XMAZG-7yhXAcfGcy79Xk7hBfiiEM7lRuk4LVvMJvSWePHFZr3a5vMWemgR '; // Server key
//$YOUR_TOKEN_ID = ''; // Client token id

$request_body = [
    'to' => $YOUR_TOKEN_ID,
    'notification' => [
        'title' => 'Onekey Prty',
        'body' => sprintf('Начало в %s.', date('H:i')),
        'icon' => '',
        'click_action' => 'http://ya.ru',
    ],
];
$fields = json_encode($request_body);

$request_headers = [
    'Content-Type: application/json',
    'Authorization: key=' . $YOUR_API_KEY,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>