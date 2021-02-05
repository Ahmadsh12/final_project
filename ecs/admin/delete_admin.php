<?php 

include('includes/adminclass.php');
   	$x = new Admin();
	$id =$_GET['id'];

	$x->delete($id);

	header("location:manage_admin.php");