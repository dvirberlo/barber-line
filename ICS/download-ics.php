<?php



include 'ICS.php';



header('Content-Type: text/calendar; charset=utf-8');

header('Content-Disposition: attachment; filename=invite.ics');


/
$ics = new ICS(array(

  'location' => $_GET['loc'],

  'description' => $_GET['des'],

  'dtstart' => $_GET['start'],

  'dtend' => $_GET['end'],

  'summary' => $_GET['sum'],

  'url' => "/about.html"

));



echo $ics->to_string();



?>