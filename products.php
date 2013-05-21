<?php 
	if($_GET["c"]){
		?>
		<p class="navigate"><a href="index.php?p=3">Categories</a></p>
		<?php
		$result = mysql_query("SELECT * FROM product WHERE Category=".$_GET["c"]);
		echo "<table class='products'><tr><th>Title</th><th>Price</th><th>Quantity</th><th>Add to Cart</th></tr>";
		while($row=mysql_fetch_array($result)){
			echo('<tr class="row vh" id="'.$row["ID"].'"><td class="title"><a href="index.php?p=7&c='.$_GET["c"].'&pid='.$row["ID"].'">'.$row["Title"].'</a></td><td><span>'.$row["Price"].'</span> <span>&#8364</span></td><td><input type="text" value="1" size="2"/></td><td align="center"><input src="add_to_shopping_cart.png" name="add_to_cart" width="48" height="48" alt="Add to Cart" type="image" onclick="addToCartA(this,'.$_GET['c'].'); return false"></td></tr>');
		}
		echo "</table>";
	}else{
		?>
		<a class="block" href="index.php?p=3&c=1">
			<img src="categories/ProgrammingLanguages.jpeg" alt="ProgrammingLanguages" height="190px" />
			<span class="info">&nbsp;&nbsp;Programming Languages</span>
		</a>
		<a class="block" href="index.php?p=3&c=2">
			<img src="categories/OperatingSystems.jpeg" alt="OperatingSystems" height="190px" />
			<span class="info">&nbsp;&nbsp;Operating Systems</span>
		</a>
		<a class="block" href="index.php?p=3&c=3">
			<img src="categories/Databases.jpeg" alt="Databases" height="175px" />
			<span class="info">&nbsp;&nbsp;Databases</span>
		</a>
		<a class="block" href="index.php?p=3&c=4">
			<img src="categories/ComputerNetwork.jpeg" alt="Networks" height="175px" />
			<span class="info">&nbsp;&nbsp;Networks</span>
		</a>
		<a class="block" href="index.php?p=3&c=5">
			<img src="categories/Web.jpeg" alt="Web" height="175px" />
			<span class="info">&nbsp;&nbsp;Web</span>
		</a>
<?php
	}
 ?>
