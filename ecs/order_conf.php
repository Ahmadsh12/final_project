
<?php include("includesp/public_header.php");
include('vendor/includesv/productclass.php');
$e = new Product();
$cust=$e->p_id=$_SESSION['p_id'];
$orderd=$e->readByIdord($cust);


?>

<section class="page-wrapper success-msg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
        	<i class="tf-ion-android-checkmark-circle"></i>
          <h2 class="text-center">Thank you!<?php echo "{$_SESSION['c_name']}";?> For your payment</h2>
          <p>Your order ID :<?php echo  $orderd[0]['order_id']; ?> </p>
          <a href="index.php" class="btn btn-main mt-20">Continue Shopping</a>
        </div>
      </div>
    </div>
  </div>
</section><

<?php include("includesp/public_footer.php"); ?>