<?php
if(isset($_SESSION['cartlist'])){
	echo "<h3>Shopping Cart</h3>";
	echo "<table class='products'><tr><th>Title</th><th>Price</th><th>Quantity</th><th align='center'>Total</th></tr>";
	$total=0;
	foreach($_SESSION['cartlist'] as $row){
		$pq=$row['quan']*$row["price"];
		$total+=$pq;
		echo('<tr onMouseOver="shadeCell(this,this.nextSibling)" onMouseOut="unShadeCell(this,this.nextSibling)" class="row" id="'.$row["id"].'"><td rowspan="2" class="title" style="vertical-align: top"><a href="index.php?p=7&pid='.$row["id"].'&c='.$row["cat"].'">'.$row["title"].'</a></td><td rowspan="2" style="vertical-align: top"><span>'.$row["price"].'</span> <span>&#8364</span></td><td align="center"><input type="text" value="'.$row['quan'].'" size="2"/></td><td align="center">'.$pq.' <span>&#8364</span></td></tr>');
		echo '<tr onMouseOver="shadeCell(this,this.previousSibling)" onMouseOut="unShadeCell(this,this.previousSibling)" class="actions"><td align="center"><a class="button blue" href="#" onclick="updateCart(this); return false;">Update</a></td><td align="center"><a class="button yellow" href="#" onclick="deleteBook(this); return false;">Delete</a></td></tr>';
	}
	echo "<tr class='row'><td colspan='3' align='right'><b>Total:</b></td><td align='center'><b>".$total." &#8364</b></td></tr>";
	echo "<tr class='actions'><td colspan='3'></td><td align='center'><a class='button large red' href='#' onclick='emptyCart(); return false;'>Empty Cart</a></td></tr>";
	echo "</table><div align='center' style='width:150px'><a onclick='checkSession(); return false;' href='#' class='button grey large toolarge'>Order Details</a></div>";
}else{
	echo "The cart is empty.";
}
 
?>