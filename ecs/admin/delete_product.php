<?php 

include('includes/productclass.php');
   	$x = new product();
	$id =$_GET['id'];

	$x->delete($id);

	header("location:manage_products.php");