<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $apiKey = '4e4252582e47962fa6d8c6f2786d8792-us10';
    $listId = '5e2047ea9a';
    $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);

    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/';
    echo $url;
    $json = json_encode([
        'email_address' => $email,
        'status'        => 'subscribed', // or 'pending' to send a confirmation email
        'merge_fields'  => [
            'FNAME'     => $name,
            'MESSAGE'   => $message,
        ]
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
