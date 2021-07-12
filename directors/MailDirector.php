<?php
$to = filter_input(INPUT_GET, "to");
$subject = filter_input(GET_POST, "subject");
$txt = filter_input(INPUT_GET, "text");

@$send = mail($to,$subject,$txt);

if(@$send = @mail($to, $subject, $txt)){
   echo "sent";
}else{
  echo "did not send";
}
?>