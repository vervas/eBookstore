<h3>Orders</h3>
<div id="orders"><div id="orderlist">
<?php 
		$result = mysql_query("select `order`.*,customer.Fname,customer.Lname from `order` inner join customer on `order`.Customer=customer.ID order by ID desc");
		echo "<table><tr><th></th><th>Customer</th><th>Order Date</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo('<tr class="row vh" id="'.$row["ID"].'"><td style="padding:10px" scope="row">'.$row["ID"].'</td><td>'.$row["Fname"].'<br />'.$row["Lname"].'</td><td><a href="#" onclick="showOrderDetails(this)">'.$row["oDate"].'</a></td></tr>');
		}
		echo "</table>";
 ?>
</div>
<div style="width:375px;" id="orderdetails">Select an order to view its details.</div>
</div>