<?php 
session_start();
$_SESSION['cartlist'][$_GET["id"]]["quan"]=$_GET["q"];
echo "<b>Quantity Updated</b><br/>Reloading..";
?>