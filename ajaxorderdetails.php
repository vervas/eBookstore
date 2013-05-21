<?php
	require("connection.php");

	$oid=$_GET['oid'];
	$result=mysql_query("select `order`, orderdetails.Quantity, product.ID, product.Title,product.Price,product.Category from `order` inner join orderdetails on `order`.ID=orderdetails.Order inner join product on orderdetails.Product=product.ID where `order`.ID=".$oid);
	echo "<h4>Order Details</h4>";
	$total=0;
	echo "<table><tr><th>Title</th><th>Quan.</th><th>Price</th></tr>";
	while($row=mysql_fetch_array($result)){
		$pq=$row['Quantity']*$row["Price"];
		$total+=$pq;
		echo('<tr class="row vh" id="'.$row["ID"].'"><td class="title"><a href="index.php?p=7&pid='.$row["ID"].'&c='.$row["Category"].'">'.$row["Title"].'</a></td><td align="center">'.$row['Quantity'].'</td><td class="price"><span>'.$row["Price"].'</span> <span>&#8364</span></td></tr>');
	}
	echo "<td colspan='2' align='right'><b>Total:</b></td><td align='center'><b>".$total." &#8364</b></td>";
	echo "</table>";
	mysql_close($dbcnx);
?>
