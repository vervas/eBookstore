<?php 
	if($_SESSION['login']==1){
		$categories=mysql_query("SELECT * FROM category");	
?>

<h4>New product</h4>
<form onSubmit="return validateProduct()" name="product" action="index.php?p=24" method="post">
<table>
<tr>
	<td align="right">Category</td><td>
	<select name="Category">
	<?php
		while($cat=mysql_fetch_array($categories)){
			echo "<option value='".$cat["ID"]."'>".$cat["Name"]."</option>";
		}
		?></select></td>
</tr>
<tr>
	<td align="right">Title</td><td><input size="90" type="text" name="Title" onchange="removeError(this)"/></td>
</tr>
<tr>
	<td align="right">Description</td><td><textarea rows="10" cols="65" name="Description" onchange="removeError(this)"></textarea></td>
</tr>
<tr>
	<td align="right">Price &#8364</td><td><input size="2" type="text" name="Price" onchange="removeError(this)"/></td>
</tr>
</table>
<input value="Submit" type="submit" />

</form>

<?php
	}else{
		echo "Forbidden";
	}
 ?>
