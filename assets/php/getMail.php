include /assets/php/Upload_Files.php

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



if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $fullname = trim(stripslashes($_POST['fullname']));
   $email = trim(stripslashes($_POST['email']));
   $contact_message = trim(stripslashes($_POST['message']));
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
     $message .= "Sender: " . $fullname . "<br />";
     $message .= "Email address: " . $email . "<br />";
     $message .= "Phone: " . $phone . "<br />";
     $message .= "Education: " . $Education . "<br />";
     $message .= "Service Type: " . $Service . "<br />";
     $message .= "Describe Your Work: " . $Work . "<br />";
     $message .= "Additional information/Questions: " . $Additional . "<br />";
     $message .= "fileToUpload: " . $fileToUpload . "<br />";
     
     
   // Set From: header
   $from =  $fullname . " <" . $email . ">";

   // Email Headers
   // $headers = array();
	$headers .= "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   ini_set("sendmail_from", $to); // for windows server
   $mail = mail($to, $subject, $message, $headers);   


	if ($mail) { echo "Thank you for your Intrest, I will contact you as soon as I can!"; }  
   else { echo "Something went wrong. Please try again."; }

}

?>
