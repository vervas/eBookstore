<?php
	require("connection.php");

	$username=$_GET['un'];
	$result=mysql_query("select ID from customer where uname='".$username."'");
	
	if (mysql_num_rows($result))
		echo(1);
	
	mysql_close($dbcnx);

?>
