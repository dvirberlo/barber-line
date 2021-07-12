<!DOCTYPE html>
<html lang="he-IL" encoding="utf-8" >
<body align="right" class="b">
<div class="w3-container">
<?php
date_default_timezone_set("Israel");
$email = filter_input(INPUT_GET, "email");
$filenameJ = "data/torim.json";
$messagesFbarber = array();
$json = json_decode(file_get_contents($filenameJ), true);
foreach($json as $m){
    if($m["email"] == $email){
        array_push($messagesFbarber, $m);
    }
}
function cmp($a, $b)
{
    if($a["hours"] && $b["hours"]){
        return strcmp($a["hours"], $b["hours"]);
    }else{
        return strcmp($a["_date"] > $b["_date"]);        
    }
}
usort($messagesFbarber, "cmp");
foreach($messagesFbarber as $message){
    toString($message);
}
function toString($m){
    $hh = array("09:30-09:45","09:45-10:00","10:00-10:15","10:15-10:30","10:30-10:45","10:45-11:00","11:00-11:15","11:15-11:30","11:30-11:45","11:45-12:00","12:00-12:15","12:15-12:30","12:30-12:45","12:45-13:00","13:00-13:15","13:15-13:30","13:30-13:45","13:45-14:00","14:00-14:15","14:15-14:30","14:30-14:45","14:45-15:00","15:00-15:15","15:15-15:30","15:30-15:45","15:45-16:00","16:00-16:15","16:15-16:30","16:30-16:45","16:45-17:00");
    echo "<div class='w3-pale-green w3-text-black w3-right w3-round-xlarge'>";
    if($m["hours"]){
    $d = date("Y-m-d",$m["_date"]);
    $h = explode(":",$m["hour"]);
    $f="AM";
    if($h[0] > 12){$f="PM"; $h[0] -= 12;}

    $e1 = ($h[1]+15)%60;
    if($e1==0){$e1.="0";}
    $ee = $h[0].":".$e1.$f;

    $hour = $h[0].":".$h[1].$f;

    //$params ="loc=0&des=תור+אצל+0&start=".$d."%20".$hour."&end=".$d."%20".$ee."&sum=תור+אצל+הספר";
    $txt = "&nbsp;&nbsp;&nbsp;".$m["name"].":יש לך תור אצל הספר בשעות ,".$hh[$m["hours"]-1]."&nbsp;&nbsp;";
    echo $txt;
    echo "<br>";
    echo "<span class='w3-small w3-text-grey'>&nbsp;&nbsp;".date("d-m-y", $m["_date"])."&nbsp;&nbsp;</span>";
    }
    else{
        echo $m["text"];
        echo "<br>";
        echo date("d-m-y", $m["_date"]);
    }
    echo "</div><br><br>";
}
?>
</div>
</body>
<head>
<meta charset="utf-8">
<title>Send Text</title>

<link rel = "shortcut icon" href="icon.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="styles/default.css" />
<link rel="stylesheet" type="text/css" href="styles/w3style.css" />
<link rel="stylesheet" type="text/css" href="styles/large.css" />

<!-- Meta Information -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Dvir Library" />
<meta name="copyright" content="copyright © 2018 Dvir Berlowitz . all rights reserved." />
<meta name="author" content="Dvir Berlowitz" />
<meta name="language" content="Hebrew" />
<meta name="Description" content="הזמנת תור לספר."/>
</head>
</html>