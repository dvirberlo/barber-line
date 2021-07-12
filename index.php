<!DOCTYPE html>

<html lang="he-IL" encoding="utf-8" >

<head>

<meta charset="utf-8">

<title>תור לספר</title>



<link rel = "shortcut icon" href="icon.png" type="image/x-icon"/>

<link rel="stylesheet" type="text/css" href="styles/default.css" />

<link rel="stylesheet" type="text/css" href="styles/w3style.css" />
לספר
<link rel="stylesheet" type="text/css" href="styles/large.css" />



<!-- Meta Information -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="Dvir Library" />

<meta name="copyright" content="copyright © 2018 Dvir Berlowitz . all rights reserved." />

<meta name="author" content="Dvir Berlowitz" />

<meta name="language" content="Hebrew" />

<meta name="Description" content="הזמנת תור לספר."/>

</head>

<body align="right" class="b">

<br>

<header class="w3-center">

<h1 class="w3">:הזמנת תור בקליק</h1>

</header>



<center>

<div class="formT1 formT2 ">

<form action="directors/RequestDirector.php" method="get">

<fieldset>

<legend>&nbsp;:הזמנת תור&nbsp; </legend>

<div id="changes">

<div id="num1" name="divs">

<input id="date" name="date" type="date" <?php date_default_timezone_set("Israel"); echo'value="'.date("Y-m-d").'" min="'.date("Y-m-d").'"'; ?>><br>

<span id="dateOut" class="w3-text-red"></span>

</div>

<div id="num2" name="divs" style="display:none">

<select dir="rtl" id="hour" name="hours">

	<option selected disabled>--בחר שעה--</option>

    <option value="1" >09:30-09:45</option>

	<option value="2" >09:45-10:00</option>

    <option value="3" >10:00-10:15</option>

    <option value="4" >10:15-10:30</option>

    <option value="4" >10:30-10:45</option>

    <option value="5" >10:45-11:00</option>

    <option value="6" >11:00-11:15</option>

    <option value="7" >11:15-11:30</option>

    <option value="8" >11:30-11:45</option>

    <option value="9" >11:45-12:00</option>

    <option value="10">12:00-12:15</option>

    <option value="11">12:15-12:30</option>

    <option value="12">12:30-12:45</option>

    <option value="13">12:45-13:00</option>

    <option value="14">13:00-13:15</option>

    <option value="15">13:15-13:30</option>

    <option value="16">13:30-13:45</option>

    <option value="17">13:45-14:00</option>

    <option value="18">14:00-14:15</option>

    <option value="19">14:15-14:30</option>

    <option value="21">14:30-14:45</option>

    <option value="22">14:45-15:00</option>

    <option value="23">15:00-15:15</option>

    <option value="24">15:15-15:30</option>

    <option value="25">15:30-15:45</option>

    <option value="26">15:45-16:00</option>

    <option value="27">16:00-16:15</option>

    <option value="28">16:15-16:30</option>

    <option value="29">16:30-16:45</option>

    <option value="30">16:45-17:00</option>

</select><br>

<span id="selOut" class="w3-text-red"></span>

</div>

<div id="num3" name="divs" style="display:none">

<input dir="rtl" id="name" name="name" type="text" placeholder="השם שלך..."><br>

<span id="nOut" class="w3-text-red"></span>

</div>

<div id="num4" name="divs" style="display:none">

<input id="email" name="email" type="email" placeholder="example@mail.com..." maxlength="30"><br>

<span id="eOut" class="w3-text-red"></span>

</div>

<div id="num5" name="divs" style="display:none">

<textarea dir="rtl" id="com" name="com" placeholder="הערות..." ></textarea>

</div>

</div><br>

<input class="wood1 w3-round-xxlarge" id="n" type="button" onclick="next();" value="הבא" />

<div id="process" class="progress">

<div id="theP" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width:2%"></div>

</div><br>

<span id="output" class="w3-text-green"></span>

</fieldset>

</form>

</div>

</center>



<img style="display:none!important" src="directors/VisitorDirector.php?page=index.php" />

<script type="text/javascript" language = "JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript" language = "JavaScript">

var p = document.getElementById("theP");

var b = document.getElementById("n");

var i = 0;

function next(op){

if(i==0){

    var d = document.getElementById("date").value;

    var dd = d.split("-").join("");

    if(dd < <?php date_default_timezone_set("Israel"); echo date("Ymd"); ?>){

		document.getElementById("dateOut").innerHTML = ".לא נבחר תאריך חוקי";

    }else{

	    p.style.width = "25%";

	    changeD(i+2);

	    i++;

	    if(op == null){

	        window.open(("/?time="+d),"_self");

	    }

    }

}else if(i==1){

	var sel = document.getElementById("hour");

	var op = sel.options[sel.selectedIndex];

	if(op.disabled){

		document.getElementById("selOut").innerHTML = ".לא נבחרה שעה";

	}else{

		p.classList.remove("progress-bar-danger");

		p.classList.add("progress-bar-warning");

		p.style.width = "50%";

		changeD(i+2);

		i++;

	}

}else if(i==2){

	var name = document.getElementById("name");

	if(name.value != ""){

	p.classList.remove("progress-bar-warning");

		p.classList.add("progress-bar-info");

		p.style.width = "75%";

		changeD(i+2);

		i++;

	}else{

		document.getElementById("nOut").innerHTML = ".לא הוזן שם";

	}

}else if(i==3){

	var email = document.getElementById("email").value;

	var valid = (email.includes(".com") || email.includes(".co.il"));

	if(email.includes("@") && valid){

		p.classList.remove("progress-bar-info");

		p.classList.add("progress-bar-success");

		p.style.width = "100%";

		b.classList.remove("wood1");

		b.classList.add("submit");

		b.value = "שלח";

		changeD(i+2);

		i = "send";

	}else{

		document.getElementById("eOut").innerHTML = ".לא הוזן מייל חוקי";

	}

}else if(i=="send"){

	b.type = "submit";

}

}

function changeD(id){

	var ID = "num" + id;

	var divs = document.getElementsByName("divs");

	for(var j = 0; j< divs.length; j++){

		if(divs[j].id == ID){divs[j].style.display = "inline";}

		else{divs[j].style.display = "none";}

	}

}

var dat = document.getElementById("date").value;

<?php

date_default_timezone_set("Israel");

if(isset($_GET['success'])){

echo 'document.getElementById("output").innerHTML = ".התור הוזמן בהצלחה";';

}

if(isset($_GET['time'])){

    $date = filter_input(INPUT_GET, 'time');

    $time = strtotime($date);

    echo "document.getElementById('date').value='".$date."';next(false);";

    $json = json_decode(file_get_contents("data/torim.json"), true);

    foreach($json as $tor){

        if($tor['_date'] == $time){

            echo 'document.getElementById("hour").options['.$tor["hours"].'].disabled = true;';

        }

    }

}

?>

</script>

<script type="text/javascript" language = "JavaScript" src="scripts/default.js"></script>

</body>

</html>