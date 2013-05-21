<?php
session_start();

if(isset($_SESSION['customer']['nfname'])){
	echo $_SESSION['customer']['nfname'];
}else echo "null1 ";

if(isset($_SESSION['customer']['nlname'])){
	echo $_SESSION['customer']['nlname'];
}else echo "null2 ";

if(isset($_SESSION['customer']['naddress'])){
	echo $_SESSION['customer']['naddress'];
}else echo "null3 ";

if(isset($_SESSION['customer']['nphone'])){
	echo $_SESSION['customer']['nphone'];
}else echo "null4 ";


echo " ".$_SESSION['customer']['id'];
?>