<?php if(isset($_SESSION['cartlist'])&&isset($_SESSION['customer'])){?>
<p class="navigate"><a href="index.php?p=4">Back to Cart</a></p>
<?php
	echo "<h3>Order Details</h3>";
	echo "<table class='products'><tr><th>Title</th><th>Price</th><th>Quantity</th><th align='center'>Total</th></tr>";
	$total=0;
	foreach($_SESSION['cartlist'] as $row){
		$pq=$row['quan']*$row["price"];
		$total+=$pq;
		echo('<tr class="row vh" id="'.$row["id"].'"><td class="title"><a href="index.php?p=7&pid='.$row["id"].'&c='.$row["cat"].'">'.$row["title"].'</a></td><td><span>'.$row["price"].'</span> <span>&#8364</span></td><td align="center">'.$row['quan'].'</td><td align="center">'.$pq.' <span>&#8364</span></td></tr>');
	}
	echo "<td colspan='3' align='right'><b>Total:</b></td><td align='center'><b>".$total." &#8364</b></td>";
	echo "</table>";
 
?>
<h4>Shipping Info</h4>
<table>
	<tr>
		<td align="right"><b>Name</b></td>
		<td><?php echo $_SESSION['customer']['fname']." ".$_SESSION['customer']['lname'];?></td>
	</tr>
	<tr>
		<td align="right"><b>Address</b></td>
		<td><?php echo $_SESSION['customer']['address'];?></td>
	</tr>
	<tr>
		<td align="right"><b>Phone</b></td>
		<td><?php echo $_SESSION['customer']['phone'];?></td>
	</tr>
</table>
<p style="margin:20px; width:100px" align="center"><a class="button large tootlarge green" href='index.php?p=14'>Buy!</a></p>
<?php }else echo "Session expired.";?>