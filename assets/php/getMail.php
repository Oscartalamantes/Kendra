
<?php 
// Replace this with your own email address
$to = 'sonnystrikes@gmail.com';
// resumesbykendra@gmail.com

function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['mysql.resumesbykendra.com']) && $_SERVER['mysql.resumesbykendra.com'] != 'off' ? 'https' : 'http',
    $_SERVER['resumeclients']
  );
}



if($_POST) 

   $fullname = trim(stripslashes($_POST['fullname']));
   $email = trim(stripslashes($_POST['email']));
   // $contact_message = trim(stripslashes($_POST['message']));
   $Additional = trim(stripslashes($_POST['Additional']));
   $goal = trim(stripslashes($_POST['goal']));
   $Work = trim(stripslashes($_POST['Work']));
   $Service = trim(stripslashes($_POST['Service']));
   $phone = trim(stripslashes($_POST['phone']));
   $Education = trim(stripslashes($_POST['Education']));

   if ($phone == '') { $phone = "N/A"; }
   if ($Education == '') { $Education = "N/A"; }

   
	if ($subject == '') { $subject = "Contact Form Submission"; }

   // Set Message
   $message .= "Email from: " . $fullname . "<br />";
	$message .= "Email address: " . $email . "<br />";
   $message .= "Phone: " . $phone . "<br />";
   $message .= "Additional: " . $Additional . "<br />";
   $message .= "goal: " . $goal . "<br />";
   $message .= "Work: " . $Work . "<br />";
   $message .= "Service: " . $Service . "<br />";
   $message .= "Education: " . $Education . "<br />";
   $message .= "Message: <br />";
   $message .= nl2br($contact_message);
   $message .= "<br /> ----- <br /> This email was sent from your site " . $_SERVER['SERVER_NAME'];  <br />";
   

   // Set From: header
   $from =  $fullname . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);

	if ($mail) { echo "OK"; }
   else { echo "Something went wrong. Please try again."; }

}

?>
