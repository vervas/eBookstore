<?php 
session_start();
$newp=array("id"=>$_GET["id"],"title"=>$_GET["title"],"price"=>$_GET["pr"],"quan"=>$_GET["q"],"cat"=>$_GET["c"]);

if(isset($_SESSION['cartlist'])){
	$cartp=$_SESSION['cartlist'];
	if(isset($cartp[$newp['id']]))
	{
		$cartp[$newp['id']]['quan']+=$newp['quan'];
	}
	else
	{
		$cartp[$newp['id']]=$newp;
	}
}else{
	$cartp = array($newp['id']=>$newp);
}
$p=$newp['price'];
$q=$cartp[$newp['id']]['quan'];
$str="<br /><b>".$newp['title']."</b><br /><br /><b>Price </b>".$p." &#8364"."<br /><b>Updated quantity </b>".$q."<br /><b>Total </b>".$q*$p." &#8364";

echo "<h3>Product added</h3>".$str;
$_SESSION['cartlist']=$cartp;

?>