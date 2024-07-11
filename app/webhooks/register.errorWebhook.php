<?php
require_once __DIR__ . '/webhookSettings.php';

function sendErrorWebhook($firstName, $lastName, $email) {
    $webhookUrl = DISCORD_WEBHOOK;

    $data = [
        'embeds' => [
            [
                'title' => "❌ Email already exists!",
                'description' => "> `{$firstName} {$lastName}` tried to register with `{$email}` but this email address is already in the database. This message was given to the end-user:\n```css\nThis email address is already registered.\n```",
                'color' => hexdec("1a56db"),
                'footer' => [
                    'text' => "Event time: " . date('Y-m-d H:i:s')
                ]
            ]
        ]
    ];

    $jsonData = json_encode($data);

    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
