<?php

if (!mysql_query("INSERT INTO customer (Fname, Lname, Address, Phone, uname, passwd) VALUES ('$_POST[Fname]','$_POST[Lname]','$_POST[Address]','$_POST[Phone]','$_POST[uname]','$_POST[passwd]')"))
  {
  die('Error: ' . mysql_error());
  }
echo "You successfully signed up!";

?>