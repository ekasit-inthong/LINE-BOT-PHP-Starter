<?php
echo "Hi Test welcome to thailand";
require("pub.php");

$responsemsg = getMqttfromlineMsg("AirCond003/Temperature");
echo $responsemsg;
echo "Pass this line alredy";
