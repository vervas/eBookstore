<?php
$title = $_POST['Title'];
$title = mysql_real_escape_string($title);
$description = $_POST['Description'];
$description = mysql_real_escape_string($description);
if (!mysql_query("update product set Category='".$_POST['Category']."', Title='".$title."', Description='".$description."', Price='".$_POST['Price']."' where ID='".$_POST['ID']."'"))
  {
  die('Error: ' . mysql_error());
  }
echo "Product successfully updated";

?>