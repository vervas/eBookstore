<?php
	session_start();
	switch($_GET['f'])
	{
		case 21:
			$_SESSION['customer']['nfname']=$_GET['n'];
			echo $_SESSION['customer']['nfname'];
			break;
		case 22:
			$_SESSION['customer']['nlname']=$_GET['n'];
			echo $_SESSION['customer']['nlname'];
			break;
		case 23:
			$_SESSION['customer']['naddress']=$_GET['n'];
			echo $_SESSION['customer']['naddress'];
			break;
		case 24:
			$_SESSION['customer']['nphone']=$_GET['n'];
			echo $_SESSION['customer']['nphone'];		
			break;
	}
?>