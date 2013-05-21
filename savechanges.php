<?php
	session_start();
	
	$changed=false;
	
	if(isset($_SESSION['customer']['nfname'])){
		$_SESSION['customer']['fname']=$_SESSION['customer']['nfname'];
		unset($_SESSION['customer']['nfname']);
		$changed=true;
	}
	
	if(isset($_SESSION['customer']['nlname'])){
		$_SESSION['customer']['lname']=$_SESSION['customer']['nlname'];
		unset($_SESSION['customer']['nlname']);
		$changed=true;
	}
	
	if(isset($_SESSION['customer']['naddress'])){
		$_SESSION['customer']['address']=$_SESSION['customer']['naddress'];
		unset($_SESSION['customer']['naddress']);
		$changed=true;
	}
	
	if(isset($_SESSION['customer']['nphone'])){
		$_SESSION['customer']['phone']=$_SESSION['customer']['nphone'];
		unset($_SESSION['customer']['nphone']);
		$changed=true;
	}
	
	if($changed){
		require("connection.php");
	
		mysql_query("UPDATE customer SET Fname = '".$_SESSION['customer']['fname']."', Lname = '".$_SESSION['customer']['lname']."', Address = '".$_SESSION['customer']['address']."', Phone = '".$_SESSION['customer']['phone']."' WHERE ID='".$_SESSION['customer']['id']."'");
		mysql_close($dbcnx);
	
		echo "<b>Your details successfully changed.</b>";
	}
	else
	{
		echo "<b>No changes were made.</b>";
	}
?>
