<?php 
	if($_GET["pid"]&&$_SESSION['login']==1){
		$result = mysql_query("SELECT * FROM product WHERE ID=".$_GET["pid"]);
		$row=mysql_fetch_array($result);
		$categories=mysql_query("SELECT * FROM category");	
?>

<h4>Edit product details</h4>
<form onSubmit="return validateProduct()" name="product" action="index.php?p=22" method="post">
<input type="hidden" name="ID" value="<?php echo $_GET['pid'];?>"/>
<table>
<tr>
	<td align="right">Category</td><td>
	<select name="Category">
	<?php
		while($cat=mysql_fetch_array($categories)){
			$selected="";
			if($row["Category"]==$cat["ID"]){ $selected="selected='selected'";}
			echo "<option ".$selected." value='".$cat["ID"]."'>".$cat["Name"]."</option>";
		}
		?></select></td>
</tr>
<tr>
	<td align="right">Title</td><td><input size="90" value="<?php echo $row['Title']?>" type="text" name="Title" onchange="removeError(this)"/></td>
</tr>
<tr>
	<td align="right">Description</td><td><textarea rows="10" cols="65" name="Description" onchange="removeError(this)"><?php echo $row['Description']?></textarea></td>
</tr>
<tr>
	<td align="right">Price &#8364</td><td><input size="2" value="<?php echo $row['Price']?>" type="text" name="Price" onchange="removeError(this)"/></td>
</tr>
</table>
<input value="Submit" type="submit" />

</form>

<?php
	}else{
		echo "Forbidden";
	}
 ?>
