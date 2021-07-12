<ul dir="rtl">
<?php
function toLI($tor){
    $hh = array("09:30-09:45","09:45-10:00","10:00-10:15","10:15-10:30","10:30-10:45","10:45-11:00","11:00-11:15","11:15-11:30","11:30-11:45","11:45-12:00","12:00-12:15","12:15-12:30","12:30-12:45","12:45-13:00","13:00-13:15","13:15-13:30","13:30-13:45","13:45-14:00","14:00-14:15","14:15-14:30","14:30-14:45","14:45-15:00","15:00-15:15","15:15-15:30","15:30-15:45","15:45-16:00","16:00-16:15","16:15-16:30","16:30-16:45","16:45-17:00");
    $string = "<li>תור ל:".$tor["name"]."  בשעה:".$hh[$tor["hours"]]." .";
    return $string;
}
date_default_timezone_set("Israel");
$day = filter_input(INPUT_GET, "day");
$filenameJ = "../data/torim.json";
$json = json_decode(file_get_contents($filenameJ), true);
$THEday = array();
foreach($json as $tor){
    if($tor["_date"] == strtotime($day)){
        array_push($THEday, $tor);
    }
}
usort($THEday, function($a, $b) {
    return $a['hours'] - $b['hours'];
});

foreach($THEday as $tor){
    echo toLI($tor);
}
?>
</ul>