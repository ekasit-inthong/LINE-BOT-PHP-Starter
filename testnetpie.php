<?php

require("pub.php");

$responsemsg = getMqttfromlineMsg("AirCond015/Temperature");
echo $responsemsg;
