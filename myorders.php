<?php if($_SESSION['login']==2){?>
<h3>My Orders</h3>
<div id="orders"><div id="orderlist">
<?php 
		$result = mysql_query("SELECT * FROM `order` WHERE Customer=".$_SESSION['customer']['id']." order by ID desc");
		echo "<table><tr><th>Order Date</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo('<tr class="row vh" id="'.$row["ID"].'"><td><a href="#" onclick="showOrderDetails(this)">'.$row["oDate"].'</a></td></tr>');
		}
		echo "</table>";
 ?>
</div>
<div id="orderdetails">Select an order to view its details.</div>
</div>
<?php }else echo "Session expired";?>