<?php 

include('includes/categoryclass.php');
   	$x = new Category();
	$id =$_GET['id'];

	$x->delete($id);

	header("location:manage_category.php");