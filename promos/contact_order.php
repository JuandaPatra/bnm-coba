<?php
// configure
$from = 'BNM Stainless Steel <noreply@bnmstainless.co.id>';
$sendTo = 'BNM Stainless Steel <mktg_googlead@bnmstainless.co.id>, Owlandfoxes <owlandfoxes@bnmstainless.co.id>, divine<divine@owlandfoxes.co.id>';
$subject = '(From Google Ads): Ask for price';
$fields = array('name' =>'Name','email' =>'Email','grade' =>'Grade','temper' =>'Temper', 'quantity' =>'Quantity'); 
// array variable name => Text to appear in email
$okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';


try {
  $emailText = "You have new message from contact form\n=============================\n";
    foreach ($_POST as $key => $value) {
      if (isset($fields[$key])) {
        $emailText .= "$fields[$key]: $value\n";
      }
    }


    mail($sendTo, $subject, $emailText, "From: " . $from);
    
    header( "refresh:1; url=thankyou.html" );
}

catch (\Exception $e) {
  $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded; }
else {
  echo $responseArray['message'];
}