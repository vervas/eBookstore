<?php 
	require("connection.php");
	
	
	if (!mysql_query("delete from product where ID='".$_GET['id']."'"))
  	{
  		die('Error: ' . mysql_error());
  	}

	mysql_close($dbcnx);
	
	echo "<b>Product deleted.</b><br />Reloading..";
		
?>
