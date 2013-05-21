<?php 
	session_start();
	
	$changed=false;
	
	if(isset($_SESSION['customer']['nfname'])){
		unset($_SESSION['customer']['nfname']);
		$changed=true;
	}

	if(isset($_SESSION['customer']['nlname'])){
		unset($_SESSION['customer']['nlname']);
		$changed=true;
	}

	if(isset($_SESSION['customer']['naddress'])){
		unset($_SESSION['customer']['naddress']);
		$changed=true;
	}

	if(isset($_SESSION['customer']['nphone'])){
		unset($_SESSION['customer']['nphone']);
		$changed=true;
	}
	if(!$changed)
	{
		echo "<b>No changes were made.</b>";
	}
	else
	{
		echo "<b>Your changes are discarded.</b>";
	}
	
	echo "<br />Reloading.."
?>