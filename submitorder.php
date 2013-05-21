<?php
if(isset($_SESSION['cartlist'])&&isset($_SESSION['customer'])){
	mysql_query("insert into `order` (Customer,oDate) values ('".$_SESSION['customer']['id']."', CURDATE())");
	$result = mysql_query("select MAX(ID) from `order`");
	$oid=mysql_result($result,0,0);
	foreach($_SESSION['cartlist'] as $row){
		mysql_query("insert into orderdetails (`Order`,Quantity,Product) values ('".$oid."','".$row['quan']."','".$row['id']."')");
	}
	echo "Order succesfully submitted. Items will be shipped as soon as possible.";
	unset($_SESSION['cartlist']);
}else{
	echo "Session expired.";
}
?>