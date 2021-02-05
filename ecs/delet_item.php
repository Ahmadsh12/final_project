<?php 
session_start();

	
	

$id =$_GET['id'];
/*echo $id;
print_r($_SESSION['cart']);
die();*/
	unset($_SESSION['cart'][$id]);

	header("location:shoping-cart.php");