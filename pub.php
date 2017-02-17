<?php

    function pubMqtt($topic,$msg){
        put("https://api.netpie.io/topic/NSETEnergySaving/$topic?retain",$msg);
    }

    function getMqtt($topic){
        get("https://api.netpie.io/topic/NSETEnergySaving/$topic");
    }

    function getMqttfromlineMsg($lineMsg){
    
        $pos = strpos($lineMsg, ":");
        if($pos){
            $splitMsg = explode(":", $lineMsg);
            $topic = $splitMsg[0];
            $msg = $splitMsg[1];
            //pubMqtt($topic,$msg);
	    getMqtt($topic);
        }else{
            $topic = "raw";
            $msg = $lineMsg;
            //pubMqtt($topic,$msg);
	    getMqtt($topic);	
        }
     }
     
     function put($url,$tmsg){
	    $ch = curl_init($url);
      	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
	    curl_setopt($ch, CURLOPT_USERPWD, "E9hGA0mNypTPQrm:eQLdZGx8csxuHIWkQTWRXQyZK");
           
      	    $result = curl_exec($ch);
	    curl_close($ch);
      	    return $result;
      }

     function get($url,$tmsg){
	    $ch = curl_init($url);
      	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
	    curl_setopt($ch, CURLOPT_USERPWD, "E9hGA0mNypTPQrm:eQLdZGx8csxuHIWkQTWRXQyZK");
           
      	    $result = curl_exec($ch);
	    curl_close($ch);
      	    return $result;
      }

?>
