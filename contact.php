<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Contact Script</title>
</head>

<body>
<?php

#We used the superglobal $_POST here
if (!($_GET['name'] && $_GET['email'] && $_GET['whoami'] 
      && $_GET['subject'] && $_GET['message'])) {
				
   #with the header() function, no output can come before it.
   #echo "Please make sure you've filled in all required information.";

   $url = "http://localhost:81/PHP-Contact-Form/contact-form.php";
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
	
	echo "<h3>Thank you!</h3>";
	echo "Here is a copy of your request:<br/><br/>";
	
	echo "Name: ".$name."<br/>";
	echo "Email: ".$email."<br/>";
	echo "Type of Request: ".$whoami."<br/>";
	echo "Subject: ".$subject."<br/>";
	echo "Message: ".$message."<br/>";
	echo "How you heard about us: ".$found."<br/>";
	if (isset($_GET['update1'])) {
		$update1 = $_GET['update1'];
		echo "Update1: ".$update1."<br />";
	} else {
		$update1 = "";
	}
	if (isset($_GET['update2'])) {
		$update2 = $_GET['update2'];
		echo "Update2: ".$update2."<br />";
	} else {
		$update2 = "";	
	}
	
	/*for ($i = 1; $i <= 2; $i++) {
		 $element_name = "update".$i;
		 echo $element_name.": ";
		 echo $$element_name;
		 echo "<br/>";
	}*/
}
echo "You are currently working on ".$_SERVER['HTTP_USER_AGENT'];
echo "<br/>The IP address of the computer you're working on is 127.0.0.1"/*.$_SERVER['HTTP_X_FORWARDED_FOR']*/;

?>
</body>
</html>