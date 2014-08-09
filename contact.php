<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Contact Script</title>
</head>

<body>
<?php
function mail_message($data_array, $template_file, $deadline_str) {

   
   #get template contents, and replace variables with data
   $email_message = file_get_contents($template_file);
   $email_message = str_replace("#DEADLINE#", $deadline_str, $email_message);
   $email_message = str_replace("#WHOAMI#", $data_array['whoami'], $email_message);
   $email_message = str_replace("#DATE#", date("F d, Y h:i a"), $email_message);
   $email_message = str_replace("#NAME#", $data_array['name'], $email_message);
   $email_message = str_replace("#EMAIL#", $data_array['email'], $email_message);
   $email_message = str_replace("#IP#", "127.0.0.1", $email_message);
   $email_message = str_replace("#AGENT#", $_SERVER['HTTP_USER_AGENT'], $email_message);
   $email_message = str_replace("#SUBJECT#", $data_array['subject'], $email_message);
   $email_message = str_replace("#MESSAGE#", $data_array['message'], $email_message);
   $email_message = str_replace("#FOUND#", $data_array['found'], $email_message);
    
   #include whether or not to contact the customer with offers in the future
   $contact = "";
   if (isset($data_array['update1'])) {
      $contact = $contact." Please email updates about your products.<br/>";
   }   
   if (isset($data_array['update2'])) {
      $contact = $contact." Please email updates about products from third-party partners.<br/>";
   }
   $email_message = str_replace("#CONTACT#", $contact, $email_message);
   

   #construct the email headers
   $to = "support@example.com";  //for testing purposes, this should be YOUR email address.
   $from = $data_array['email'];
   $email_subject = "CONTACT #".time().": ".$data_array['subject'];

   $headers  = "From: " . $from . "\r\n";
   $headers .= 'MIME-Version: 1.0' . "\n";  //these headers will allow our HTML tags to be displayed in the email
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   
   
   #now mail
   mail($to, $email_subject, $email_message, $headers);
  
}
#We used the superglobal $_POST here
if (!($_GET['name'] && $_GET['email'] && $_GET['whoami'] 
      && $_GET['subject'] && $_GET['message'])) {
				
   #with the header() function, no output can come before it.
   #echo "Please make sure you've filled in all required information.";
	 $query_string = $_SERVER['QUERY_STRING'];
	 #add a flag called "error" to tell contact_form.php that something needs fixed
   $url = "http://".$_SERVER['HTTP_HOST']."/PHP-Contact-Form/contact-form.php?".$query_string."&error=1";
   header("Location: ".$url);
   exit(); // stops program here
}

/*echo "<h3>Thank you!</h3>";
echo "Here is a copy of your request:<br/><br/>";

echo "Name: ".$_POST['name']."<br/>";
echo "Email: ".$_POST['email']."<br/>";
echo "Type of Request: ".$_POST['whoami']."<br/>";
echo "Subject: ".$_POST['subject']."<br/>";
echo "Message: ".$_POST['message']."<br/>";
echo "How you heard about us: ".$_POST['found']."<br/>";
echo "Update you about our products: ".$_POST['update1']."<br/>";
echo "Update you about partners' products: ".$_POST['update2']."<br/>";*/

/*extract($_POST, EXTR_PREFIX_SAME, "post");

echo "<h3>Thank you!</h3>";
echo "Here is a copy of your request:<br/><br/>";

echo "Name: ".$name."<br/>";
echo "Email: ".$email."<br/>";
echo "Type of Request: ".$whoami."<br/>";
echo "Subject: ".$subject."<br/>";
echo "Message: ".$message."<br/>";
echo "How you heard about us: ".$found."<br/>";
echo "Update you about our products: ".$update1."<br/>";
echo "Update you about partners' products: ".$update2."<br/>";*/
if (isset($_GET['name'], $_GET['email'], $_GET['whoami'], $_GET['subject'], $_GET['message'], $_GET['found'])) {
	
	extract($_GET, EXTR_PREFIX_SAME, "get");
	#we want a deadline 2 days after the message date.
   $deadline_array = getdate();
   $deadline_day = $deadline_array['mday'] + 2;

   $deadline_stamp = mktime($deadline_array['hours'],$deadline_array['minutes'],$deadline_array['seconds'],
   $deadline_array['mon'],$deadline_day,$deadline_array['year']);
   $deadline_str = date("F d, Y", $deadline_stamp);
	//DOCUMENT_ROOT is the file path leading up to the template name.
	mail_message($_GET, $_SERVER['DOCUMENT_ROOT']."PHP-Contact-form/email_template.txt", $deadline_str);
	
	include($_SERVER['DOCUMENT_ROOT']."PHP-Contact-Form/template_top.inc");
}
echo "You are currently working on ".$_SERVER['HTTP_USER_AGENT'];
echo "<br/>The IP address of the computer you're working on is 127.0.0.1"/*.$_SERVER['HTTP_X_FORWARDED_FOR']*/;

 include($_SERVER['DOCUMENT_ROOT']."PHP-Contact-Form/template_bottom.inc");
?>
</body>
</html>