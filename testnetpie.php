<?php
echo "Hi Test";
require("pub.php");

$responsemsg = getMqttfromlineMsg("AirCond003/Temperature");
echo $responsemsg;
