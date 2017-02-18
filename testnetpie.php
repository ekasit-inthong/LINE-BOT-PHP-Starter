<?php
echo "Welcome to thailand" . "\r\n";
require("pub.php");

$responsemsg = getMqttfromlineMsg("AirCond003/Temperature");
echo $responsemsg . "\r\n";
echo "Pass this line alredy" . "\r\n";
