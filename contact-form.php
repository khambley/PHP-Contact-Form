<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP-Contact-Form</title>
</head>

<body>
<h3>Contact ACME Corporation</h3>
<form method="POST" action="contact.php">
<table>
<tr>
<td align="right">
Name:
</td>
<td align="left">
<input type="text" size="25" name="name" value="">
</td>
</tr>
<tr>
<td align="right">
Email:
</td><td align="left">
<input type="text" size="25" name="email" value="">
</td>
</tr>
<tr>
<td align="right">
Type of Request:
</td>
<td align="left">
<select name="whoami">
<option value="" />Please choose...
<option value="newcustomer" />I am interested in becoming a customer.
<option value="customer" />I am a customer with a general question.
<option value="support" />I need technical help using the website.
<option value="billing" />I have a billing question.
</select>
</td>
</tr>
<tr>
<td align="right">
Subject:
</td>
<td align="left">
<input type="text" size="50" max="50" name="subject" value="">
</td>
</tr>
<tr>
<td align="right" valign="top">
Message:
</td>
<td align="left">
<textarea name="message" cols="50" rows="8">
</textarea>
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
<input type="checkbox" name="update1" checked="checked">Please email me updates about your products.<br/>
<input type="checkbox" name="update2">Please email me updates about products from third-party partners.
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