
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
echo $result . "\r\n";

$sline = json_decode($result, true);
echo $sline->channelId;

echo "NETPIE";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/NGBox03?auth=21CTvyzpbA8Aafa:dZ4rx0MvMin1uKxF4z0c2VUKX");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$text = curl_exec($ch);
curl_close ($ch);                       
echo $text . "\r\n";


echo "End of File 3333";

$json = '["apple","orange","banana","strawberry"]';
$ar = json_decode($json);
// access first element of $ar array
echo $ar[0]; // apple

$json = '[
    {
        "title": "Professional JavaScript",
        "author": "Nicholas C. Zakas"
    }
]';

$books = json_decode($text);
// access property of object in array
echo $books[0]->topic; // JavaScript: The Definitive Guide
