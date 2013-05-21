<?php
$title = $_POST['Title'];
$title = mysql_real_escape_string($title);
$description = $_POST['Description'];
$description = mysql_real_escape_string($description);
if (!mysql_query("INSERT INTO `product` (`Title`, `Description`, `Price`, `Category`) VALUES ('".$title."', '".$description."', ".$_POST['Price'].", ".$_POST['Category'].")"))
  {
  die('Error: ' . mysql_error());
  }
echo "Product successfully added";

?>