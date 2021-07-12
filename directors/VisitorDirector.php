<?php
$_page = filter_input(INPUT_GET, 'page');
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
date_default_timezone_set("Israel");
$date = date("Y-m-d H:i:s");

class Visitor{
	var $page;
	var $dat;
	var $ip;
	public function __construct($p, $d, $i){
		$this->page = $p;
		$this->dat = $d;
		$this->ip = $i;
	}
}
function toStringV($vis){
	return 'page: '. $vis->page.' || date: '. $vis->dat . ' || ip: ' . $vis->ip;
}

$ip = get_client_ip();
$visitor = new Visitor($_page, $date, $ip);
$filenameJ = "../data/visitors.json";
$json = json_decode(file_get_contents($filenameJ), true);
array_unshift($json, $visitor);
file_put_contents($filenameJ, json_encode($json));

?>