<?php 

include('includes/vendorclass.php');
   	$x = new vendor();
	$id =$_GET['id'];

	$x->delete($id);

	header("location:vendor.php");