<?php
header('Access-Control-Allow-Origin: https://krishack.se');

// Fork 2020-03-26 tillföljd av specifik fråga i initial commit.
// ORIGIN är ett aningen "pålitligare" värde att kontrollera än HTTP_REFERER
// Antar att ambitionen är att undvika att använda kakor (enda totalt effektiva sättet att förhindra spam/csrf).

$referer = isset($_SERVER['ORIGIN']) && is_string($_SERVER['ORIGIN']) ? $_SERVER['ORIGIN'] : '';
$ref_ok = preg_match ('/^https:\/\/krishack.se/', $referer) === 1;

if(isset($_POST) && $ref_ok){

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
  mail('niina@46elks.com',$subject,$message,$headers);
  }
  