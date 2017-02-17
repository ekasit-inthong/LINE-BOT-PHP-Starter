<?php
$access_token = '6T6xGizSRdRqxp5i9wZS9hcIPPirBz1jHLLjSdTXgO2RShvaVjPLedPCd3IE7Eq41WDq/zOWA+OHcV/UxemmpqHzugP7DboI9wVHIziRy8r1tLLyeV1EW4Tgf4FOPSFZdy7kSpiJ6j84T02qop4UKAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
