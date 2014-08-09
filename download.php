<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
$filepath = $_SERVER['DOCUMENT_ROOT']."PHP-Contact-form/acme_brochure.pdf";
if (file_exists($filepath)) {
   header("Content-Type: application/force-download");
   header("Content-Disposition:filename=\"brochure.pdf\"");
   $fd = fopen($filepath,'rb');
   fpassthru($fd);
   fclose($fd);
}
?>
</body>
</html>