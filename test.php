<?php

date_default_timezone_set("Israel");

$tor["_date"] = "1522357200" ;

$tor["hours"] = "8";

$tor["hour"] = "11:15";

$tor["name"] = "user";

$tor["email"] = "user@gmail.com";



$sub = "barber-line";

$d = date("Y-m-d",$tor["_date"]);

$h = explode(":",$tor["hour"]);

$f="AM";

if($h[0] > 12){$f="PM"; $h[0] -= 12;}



$e1 = ($h[1]+15)%60;

if($e1==0){$e1.="0";}

$ee = $h[0].":".$e1.$f;



$hour = $h[0].":".$h[1].$f;



$params ="loc=0&des=תור+אצל0&start=".$d." ".$hour."&end=".$d." ".$ee."&sum=תור+אצל+הספר";

echo $params;

?>