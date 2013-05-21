<?php
	if(isset($_POST['uname'])){
		$result = mysql_query("SELECT * FROM customer where uname='".$_POST['uname']."'");
		if(mysql_num_rows($result))
		{
			$row=mysql_fetch_array($result);
			$customer[$row["uname"]]=array("id"=>$row["ID"],"fname"=>$row["Fname"],"lname"=>$row["Lname"],"address"=>$row["Address"],"phone"=>$row["Phone"],"passwd"=>$row["passwd"]);
			if($customer[$_POST["uname"]]["passwd"]==$_POST["passwd"])
			{
				echo "Success";
				$_SESSION['login']=2;
				$_SESSION['customer']=$customer[$_POST["uname"]];
				reloading("1");
			}
			else
			{
				echo '<p style="color:red">Wrong Username or Password. Please try again.</p>';
				include("login.html");
			}
		}
		else
		{
			echo '<p style="color:red">Wrong Username or Password. Please try again.</p>';
			include("login.html");
		}
	}
	else
	{
		if($_POST["passwd"]==null)
		{ 
			include("login.html");
		}
		elseif($_POST["passwd"]=="123456")//default admin password
		{
			echo "Administrator Session";
			$_SESSION['login']=1;
			reloading("1");
		}
		else
		{
			echo '<p style="color:red">Wrong Password. Please try again.</p>';
			include("login.html");
		}
	}
	
	function reloading($sec){
			$page = $_SERVER['PHP_SELF'];
			header("Refresh: $sec; url=$page");
			echo "<br />Reloading!";
	}
?>
