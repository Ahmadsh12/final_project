<?php
session_start();

if (! $_SESSION['p_id'])
{

/*$_SESSION['flag']=$i;*/
    header("location:login_public/login_p.php");

}else{


include('vendor/includesv/productclass.php');
$e = new Product();

$e->order_date=date("Y/m/d");
$cust=$e->p_id=$_SESSION['p_id'];
$e->createor();
$orderd=$e->readByIdord($cust);

/*print_r($orderd);
die();*/
	             foreach ($_SESSION['cart'] as $k => $v) {
		           $row=$e->readById($k);
	              $row=$row[0];
	              $e->order_id=$orderd[0]['order_id'];
	             $e->product_id=$k;
	             $e->product_qty=$v;
	             $q=$e->createord();


	              
	          }
	          if($q){
	          	unset($_SESSION['cart']);
	          	header("location:order_conf.php");
	          }



	              
	          
}

?>