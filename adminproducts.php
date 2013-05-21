<?php
if($_SESSION['login']==1){
		echo "<h3>Products</h3><div align='center' style='margin:25px; position:absolute; top:15px; right:0px; width:100px'><a href='index.php?p=23' class='button green large'>New</a></div>";
		$result = mysql_query("SELECT product.*,category.Name FROM product inner join category on product.Category=category.ID order by product.Category");
		echo "<table class='products'><tr><th>Title</th><th>Price</th></tr>";
		$category="";
		while($row=mysql_fetch_array($result)){
			if($row["Name"]!=$category){
				echo "<tr><td colspan='4'><h4>".$row['Name']."</h4></td></tr>";
				$category=$row["Name"];
			}
			echo('<tr class="row vh" id="'.$row["ID"].'"><td class="title"><a href="index.php?p=7&c='.$row["Category"].'&pid='.$row["ID"].'">'.$row["Title"].'</a></td><td><span>'.$row["Price"].'</span> <span>&#8364</span></td><td align="center"><a href="index.php?p=21&pid='.$row["ID"].'" class="button grey">Edit</a></td><td align="center"><a href="#" onclick="deleteProduct(this)" class="button red">Delete</a></td></tr>');
			}
			echo "</table>";
			}else echo "Forbidden";
?>