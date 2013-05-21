<?php 
	echo "<h3>Product Categories</h3>";
	$result = mysql_query("SELECT * FROM category");
	while($row = mysql_fetch_array($result)){
		echo("<p><a href='./index.php?p=3&c=".$row["ID"]."'>" . $row["Name"] . "</a></p>");
	}
?>
