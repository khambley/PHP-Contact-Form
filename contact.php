<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Contact Script</title>
</head>

<body>
<?php

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

extract($_POST, EXTR_PREFIX_SAME, "post");

echo "<h3>Thank you!</h3>";
echo "Here is a copy of your request:<br/><br/>";

echo "Name: ".$name."<br/>";
echo "Email: ".$email."<br/>";
echo "Type of Request: ".$whoami."<br/>";
echo "Subject: ".$subject."<br/>";
echo "Message: ".$message."<br/>";
echo "How you heard about us: ".$found."<br/>";


for ($i = 1; $i <= 2; $i++) {
   $element_name = "update".$i;
   echo $element_name.": ";
   echo $$element_name;
   echo "<br/>";
}
?>
</body>
</html>