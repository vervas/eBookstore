<?php
if($_SESSION['login']==1){
		echo "<h3>Customers</h3>";
		$result = mysql_query("SELECT * FROM customer");
		echo "<table class='products'><tr><th>First Name</th><th>Last Name</th><th>Address</th><th>Phone</th></tr>";
		$category="";
		while($row=mysql_fetch_array($result)){
			if($row["Name"]!=$category){
				echo "<tr><td colspan='4'><h4>".$row['Name']."</h4></td></tr>";
				$category=$row["Name"];
			}
			echo('<tr class="row vh" id="'.$row["ID"].'"><td>'.$row["Fname"].'</td><td>'.$row["Lname"].'</td><td>'.$row["Address"].'</td><td>'.$row["Phone"].'</td><td align="center"><a href="#" onclick="deleteCustomer(this)" class="button red">Delete</a></td></tr>');
			}
			echo "</table>";
			}else echo "Forbidden";
?>