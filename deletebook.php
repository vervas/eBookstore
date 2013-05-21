<?php 
session_start();
unset($_SESSION['cartlist'][$_GET["id"]]);
if(count($_SESSION['cartlist'])==0)
{
	unset($_SESSION['cartlist']);
}
echo "<b>Item Deleted</b><br/>Reloading..";
?>