
<?php
$access_token = '6T6xGizSRdRqxp5i9wZS9hcIPPirBz1jHLLjSdTXgO2RShvaVjPLedPCd3IE7Eq41WDq/zOWA+OHcV/UxemmpqHzugP7DboI9wVHIziRy8r1tLLyeV1EW4Tgf4FOPSFZdy7kSpiJ6j84T02qop4UKAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Ekasit Test Add
			$ch = curl_init();
			switch ($text) {
				case "SmartWeight01":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/SmartWeight01?auth=P0CqrrFZn3bUfRn:eJYbG9NHWkn9fzqdcuJatOcer");					
				     break;
				case "NGBox01":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/NGBox01?auth=21CTvyzpbA8Aafa:dZ4rx0MvMin1uKxF4z0c2VUKX");					
				     break;
				case "NGBox02":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/NGBox02?auth=eLQc5uIQ4B0pHW8:bqJY7lIWiW5O1MZ61ye2sJdMH");					
				     break;
				case "NGBox03":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/NGBox03?auth=n0PlLs4QUER78p9:6HECUvJ23BtRh9ylrMWm3KXnH");					
				     break;
				case "AirCond01":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/AirCond01?auth=P0CqrrFZn3bUfRn:eJYbG9NHWkn9fzqdcuJatOcer");					
				     break;
				case "AirCond02":
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/AirCond02?auth=P0CqrrFZn3bUfRn:eJYbG9NHWkn9fzqdcuJatOcer");					
				     break;
				default:
				     curl_setopt($ch,CURLOPT_URL,"https://api.netpie.io/topic/SmartNSET/SmartWeight01?auth=P0CqrrFZn3bUfRn:eJYbG9NHWkn9fzqdcuJatOcer");					
			}	
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			$text = curl_exec($ch);
			curl_close ($ch);			
			$obj = json_decode($text);
			$mydata = $obj[0]->topic . ":" . $obj[0]->payload;
			
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $mydata
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
