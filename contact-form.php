<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP-Contact-Form</title>
</head>

<body>
<?php

if (isset($_GET['error']) == "1") {
   $error_code = 1;  //this means that there's been an error and we need to notify the customer
} else {
   $error_code = 0;
}

?>
<h3>Contact ACME Corporation</h3>
<?php
if ($error_code) {
   echo "<div style='color:red'>Please help us with the following:</div>";
}
?>
<form method="GET" action="contact.php">
<table>
<tr>
<td align="right">
Name:
</td>
<td align="left">
<input type="text" size="25" name="name" value="<?php if (isset($_GET['name'])) { echo $_GET['name']; } ?>" />
<?php
if ($error_code && !($_GET['name'])) {
   echo "<b>Please include your name.</b>";
}
?>
</td>
</tr>
<tr>
<td align="right">
Email:
</td><td align="left">
<input type="text" size="25" name="email" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; } ?>" />
<?php
if ($error_code && !($_GET['email'])) {
   echo "<b>Please include your email address.</b>";
}
?>
</td>
</tr>
<tr>
<td align="right">
Type of Request:
</td>
<td align="left">
<select name="whoami">
<option value="" />Please choose...
<option value="newcustomer"<?php if (isset($_GET['whoami'])) {if ($_GET['whoami'] == "newcustomer") {echo " selected";}} ?> />I am interested in becoming a customer.
<option value="customer"<?php if (isset($_GET['whoami'])) {
if ($_GET['whoami'] == "customer") {
   echo " selected";
}}
?> />I am a customer with a general question.
<option value="support"<?php if (isset($_GET['whoami'])) { 
if ($_GET['whoami'] == "support") {
   echo " selected";
}}
?> />I need technical help using the website.
<option value="billing"<?php if (isset($_GET['whoami'])) {
if ($_GET['whoami'] == "billing") {
   echo " selected";
}} 
?> />I have a billing question.
</select>
<?php
if ($error_code && !($_GET['whoami'])) {
   echo "<b>Please choose a request type.</b>";
}
?>
</td>
</tr>
<tr>
<td align="right">
Subject:
</td>
<td align="left">
<input type="text" size="50" max="50" name="subject" 
value="<?php if (isset($_GET['subject'])) { echo $_GET['subject']; } ?>" />
<?php
if ($error_code && !($_GET['subject'])) {
   echo "<b>Please add a subject for your request.</b>";
}
?>
</td>
</tr>
<tr>
<td align="right" valign="top">
Message:
</td>
<td align="left">
<textarea name="message" cols="50" rows="8">
<?php if (isset($_GET['message'])) { echo $_GET['message']; } ?>
</textarea>
<?php
if ($error_code && !($_GET['message'])) {
   echo "<b>Please fill in a message for us.</b>";
}
?>
</td>
</tr>
<tr>
<td colspan="2" align="left">
How did you hear about us?
<ul>
<input type="radio" name="found" value="wordofmouth" />Word of Mouth<br/>
<input type="radio" name="found" value="search" />Online Search<br/>
<input type="radio" name="found" value="article" />Printed publication/article<br/>
<input type="radio" name="found" value="website" />Online link/article<br/>
<input type="radio" name="found" value="other" />Other
</ul>
</td>
</tr>
<tr>
<td colspan="2">
<input type="checkbox" name="update1" checked="checked" />Please email me updates about your products.<br/>
<input type="checkbox" name="update2" />Please email me updates about products from third-party partners.
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="SUBMIT" />
</td></tr>
</table>
</form>
</body>
</html>