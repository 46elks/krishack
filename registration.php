<?php

// kan kolla om HTTP referer är krishack.se eller inte (går det att se vid POST?)
if(isset($_POST)){

  $to = "victoria@46elks.com";
  $from = "entill@krishack.se";

  $name  = $_POST['participant_name'];

  $email = $_POST['participant_email'];
  $phone = $_POST['participant_phone'];

  // Mailet
  $subject = "En till person (".$name.") intresserad av krishack";


  $message = $name . " är intresserad av att delta i krishack." . "\n\n" . $name . "\n" . $email . "\n" . $phone;
  // Kan formulera ett trevlig meddelande som automatiskt skickas till den som lämnat intresseanmälan också.
  // - Hör av dig till ... om du inte fått mer information inom ett dygn.
  // - Du kan komma igång redan nu genom att...
  // - Som deltagare har du tillgång till...

  $headers = "From:" . $from;

  mail($to,$subject,$message,$headers);
  header('Location: /#klar');
  }
?>
