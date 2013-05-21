<?php
		echo "<h2>Welcome</h2><h3>Latest Products</h3>";
		$result = mysql_query("SELECT product.*,category.Name FROM product inner join category on product.Category=category.ID order by product.ID desc");
		echo "<table>";
		$category="";
		$counter=0;
		while($counter<7&&$row=mysql_fetch_array($result)){
			$counter+=1;
			if($row["Name"]!=$category){
				echo "<tr><td colspan='2'><h4>".$row['Name']."</h4></td></tr>";
				$category=$row["Name"];
			}
			echo('<tr class="row vh" id="'.$row["ID"].'"><td><a href="index.php?p=7&c='.$row["Category"].'&pid='.$row["ID"].'">'.$row["Title"].'</a></td><td class="price"><span>'.$row["Price"].'</span> <span>&#8364</span></td></tr>');
			}
			echo "</table>";
?>