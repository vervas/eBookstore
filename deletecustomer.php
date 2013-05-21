<?php 
	require("connection.php");

	
	if (!mysql_query("delete from customer where ID='".$_GET['id']."'"))
  	{
  		die('Error: ' . mysql_error());
  	}

	mysql_close($dbcnx);
	
	echo "<b>Customer deleted.</b><br />Reloading..";
		
?>
