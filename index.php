<?php ob_start();
session_start();
if($_GET["p"]==10||!isset($_SESSION['login'])){
	$_SESSION['login']=0;
}
require("connection.php");
ini_set('session.gc_maxlifetime', 8*60*60);
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>eBookstore</title>
<link rel="shortcut icon" href="favicon.ico" >
<link rel="stylesheet" type="text/css" href="bookstore.css" />
<link rel="stylesheet" type="text/css" href="buttons.css" />
<script type="text/javascript" src="bookstore.js"/></script>
</head>
<body>
<div id="padded" onclick="hide(this)"><div onclick="stoppg(this)" id="message"></div></div>
<div id="container">

<div id="header">
<img style="position:absolute; left:10px" width="200px" src="books-icon.png"/>
<h1>Bookstore!</h1>
<p style="margin:0 auto;width:500px" class="navigate">
<a href="./index.php?p=1">Home</a> | 
<a href="./index.php?p=2">Our shop</a> | 
<a href="./index.php?p=3">Our Products</a> | 
<a href="./index.php?p=4">Shopping Cart</a> | 
<a href="./index.php?p=6">Contact</a>
</p></div>

<div id="main">
	<div id="sidebar">
	<div class="rwhite">
	<?php 
		switch($_SESSION['login']){
			case 1:
				include("admin.php");
				break;
			case 2:
				include("user.php");
				break;
			default:
				echo '<p><a href="index.php?p=5">Login</a></p><p><a href="index.php?p=9">Sign up</a></p>';
		}
	?>
	</div>
	<div class="rwhite">
	<?php
		include("categories.php");
	?>
	</div>
	</div>
	<div class="rwhite" id="center">
	<?php 
		switch($_GET["p"]){
			case 1:
				include("home.php");
				break;
			case 2:
				include("shop.php");
				break;
			case 3:
				include("products.php");
				break;
			case 4:
				include("cart.php");
				break;
			case 5:
				include("login.html");
				break;
			case 6:
				include("contact.php");
				break;
			case 7:
				include("productdetails.php");
				break;		
			case 8:
				include("validate.php");
				break;
			case 9:
				include("signup.html");
				break;
			case 10:
				echo("You are successfully logged out");
				unset($_SESSION['customer']);
				break;
			case 11:
				include("myorders.php");
				break;
			case 12:
				include("mydetails.php");
				break;
			case 13:
				include("orderdetails.php");
				break;
			case 14:
				include("submitorder.php");
				break;
			case 15:
				include("signup.php");
				break;
			case 20:
				include("adminproducts.php");
				break;
			case 21:
				include("editproduct.php");
				break;
			case 22:
				include("updateproduct.php");
				break;
			case 23:
				include("newproduct.php");
				break;
			case 24:
				include("insertproduct.php");
				break;
			case 25:
				include("orders.php");
				break;
			case 26:
				include("customers.php");
				break;
			default:
				echo "Welcome";
		}
	
	?>
	
	</div>


</div>

<div id="footer">Verraros Dimitrios © 2011</div>

</div>

</body>

</html>
<?php mysql_close($dbcnx); ob_flush(); ?>
