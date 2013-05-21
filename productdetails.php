<?php
	$result = mysql_query("SELECT Name FROM category WHERE ID=".$_GET["c"]);
	$cat=mysql_result($result,0);
?>
<p class="navigate"><a href="index.php?p=3">Categories</a> > <a href="index.php?p=3&c=<?php echo $_GET["c"]?>"><?php echo $cat?></a></p><p>
<?php 
	if($_GET["pid"]){
		$result = mysql_query("SELECT * FROM product WHERE ID=".$_GET["pid"]);
		$row=mysql_fetch_array($result);
		echo	"<b>Title</b><h3 id='ptitle'>".$row["Title"]."</h3>";
		echo "<b>Desctription</b><p id='pdescription'>".$row["Description"]."</p>";
		?>
		<p><b>Price</b> <span id="price"><?php echo $row["Price"]?></span> <span>&#8364</span><br>
		<input src="add_to_shopping_cart.png" name="add_to_cart" width="64" height="64" alt="Add to Cart" type="image" onclick="addToCart(<?php echo "'".$_GET["pid"]."','".$row["Title"]."','".$row["Price"]."','1','".$row["Category"]."'";?>); return false"></p></p>
		<?php
	}else{
		include("categories.php");
	}
 ?>
