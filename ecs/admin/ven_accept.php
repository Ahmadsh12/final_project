<?php 

include('includes/vendorclass.php');
   	$x = new vendor();
	$id =$_GET['id'];

   $q=$x->readById($id);
   $q=$q[0];
/*print_r($q['ven_password']);
die();*/
    /*print_r($q[0]['ven_name']);*/
    

    /*$name = $q['ven_name'];*/

    $x->ven_name = $q['ven_name'];
    $x->ven_email = $q['ven_email'];
    $x->ven_password = $q['ven_password'];
    $x->ven_mobile = $q['ven_mobile'];
    $x->ven_comname = $q['ven_comname'];
    $x->ven_image = $q['ven_image'];
    $x->ven_desc = $q['ven_desc'];
    
    $x->createa();
    $x->delete($id);
        
        
        
        /*$x->av_email  = $_GET['ven_pass'];
        $x->av_mobile    = $ven_mobile;
        $x->av_comname   = $ven_comname;
        $x->av_image     = $_FILES['ven_image']['name'];
        $tmp_name         = $_FILES['ven_image']['tmp_name'];
        $path             ='../images/ven_img/'; 
        $x->ven_desc      = $ven_desc;   
        move_uploaded_file($tmp_name,$path.$x->av_image);*/
	/*$x->createa($id);*/

	header("location:vendor.php");