<?php 

include('includes/customerclass.php');
   	$x = new customer();
	$id =$_GET['id'];

	$x->delete($id);

	header("location:manage_customers.php");