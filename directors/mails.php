<?php

$filenameJ = "../data/torim.json";

$json = json_decode(file_get_contents($filenameJ), true);

date_default_timezone_set("Israel");

$today = strtotime("today");

$hour = date("H");

$minu = date("i");

$minu-=($minu%15);

if(strlen($minu) == 1){$minu.="0";}

$_time1 = $hour.":".$minu;

$minu += 15;

$minu = $minu%60;

if(strlen($minu) == 1){$minu.="0";$hour++;}

$_time = $_time1."-".$hour.":".$minu;

$Hindex = null;

$i = 0;

$hh = array("09:30-09:45","09:45-10:00","10:00-10:15","10:15-10:30","10:30-10:45","10:45-11:00","11:00-11:15","11:15-11:30","11:30-11:45","11:45-12:00","12:00-12:15","12:15-12:30","12:30-12:45","12:45-13:00","13:00-13:15","13:15-13:30","13:30-13:45","13:45-14:00","14:00-14:15","14:15-14:30","14:30-14:45","14:45-15:00","15:00-15:15","15:15-15:30","15:30-15:45","15:45-16:00","16:00-16:15","16:15-16:30","16:30-16:45","16:45-17:00");

foreach($hh as $ho){

    if($_time == $ho){

        $Hindex = $i;

    }

    $i++;

}

$arr = array();

$i = 0;

foreach($json as $tor){

    if($tor["_date"] == $today){

        if($tor["hours"] < ($Hindex+4) && $tor["hours"] >= $Hindex && $tor["sent"] != "true"){

            array_push($arr,$tor);

            $json[$i]["sent"] = "true";

        }

    }

    $i++;

}

function send_mail($to,$subject,$txt){

    $txt = wordwrap($txt,55);

    mail($to,$subject,$txt);

}

print_r($arr);

foreach($arr as $tor){

    $sub = "barber-line";

    $d = date("Y-m-d",$tor["_date"]);

    $h = explode(":",$tor["hour"]);

    $h -= 3;

    $f="AM";

    if($h[0] > 12){$f="PM"; $h[0] -= 12;}



    $e1 = ($h[1]+15)%60;

    if($e1==0){$e1.="0";}

    $ee = $h[0].":".$e1.$f;



    $hour = $h[0].":".$h[1].$f;



    $params ="loc=0&des=תור+אצל0&start=".$d."%20".$hour."&end=".$d."%20".$ee."&sum=תור+אצל+הספר";

    $txt = $tor["name"].":יש לך תור אצל הספר בשעות ,".$hh[$tor["hours"]-1]."\n /ICS/download-ics.php?".$params;

    send_mail($tor["email"],$sub,$txt);

}

file_put_contents($filenameJ, json_encode($json));

?>