<?php 
// Replace this with your own email address
$to = '';
// resumesbykendra@gmail.com

function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['mysql.resumesbykendra.com']) && $_SERVER['mysql.resumesbykendra.com'] != 'off' ? 'https' : 'http',
    $_SERVER['resumeclients']
  );
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $Name = trim(stripslashes($_POST['Name']));
   $Email = trim(stripslashes($_POST['Email']));
   $Subject = trim(stripslashes($_POST['Subject']));
   $Phone = trim(stripslashes($_POST['Phone']));
   $Massage = trim(stripslashes($_POST['Message']));
   


   if ($Phone == '') { $Phone = "N/A"; }

   
	if ($subject == '') { $subject = "Contact Form Submission"; }

   // Set Message
   $message .= "Name: " . $Name . "<br />";
   $message .= "Email: " . $Email . "<br />";
   $message .= "Subject: " . $Subject . "<br />";
   $message .= "Phone: " . $Phone . "<br />";
   $message .= "Message: " . $Message . "<br />";
   
   $message .= nl2br($contact_message);
   $message .= "<br /> ----- <br /> This email was sent from your site " . $_SERVER['SERVER_NAME'] . "<br />" ;
   

   // Set From: header
   $from =  $Name . " <" . $Email . ">";

   // Email Headers
   // $headers = array();
	$headers .= "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $Email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);   


	if ($mail) { echo ""; }  
   else { echo "Something went wrong. Please try again."; }

}

?>