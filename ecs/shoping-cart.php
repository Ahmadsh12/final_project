
<!-- Main Menu Section -->
<?php include("includesp/public_header.php");

include('vendor/includesv/productclass.php');
$e = new Product();
if(isset($_POST['add']) & isset($_POST['product-quantity'])){
$pro_id=$_POST['add'];
$qty=$_POST['product-quantity'];
$_SESSION['cart'][$pro_id]=$qty;
}

	
	
	/*echo "<pre>";
print_r($_SESSION['cart']);*/

	/*if (! $_SESSION['p_id'])
{
    header("location:localhost/ecs/login_public/login_p.php");

}*/


?>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
            
					
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Description</th>
                      <th class="">Quantity</th>
                      <th class="">Total</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <?php
                  	$Subtotal=0; 
                  	if(isset($_SESSION['cart'])){
	             foreach ($_SESSION['cart'] as $k => $v) {
		           $row=$e->readById($k);
	              $row=$row[0];

		?>
                  <tbody>
                  	
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          
                         <?php echo " {$row['pro_name']} <img width='80' src='vendor/img/pro/{$row['pro_image']}'  alt=''/> ";?>
                          
                        </div>
                      </td>
                      <td class=""><?php echo "$ {$row['pro_price']}";?></td>
                      <td class=""><?php echo "{$row['pro_desc']}";?></td>
                      <td class=""><?PHP echo $v; ?></td>
                      <td class=""><?php
                      	$Total=$row['pro_price']*$v;
						$Subtotal+=$Total;
                       echo "$".$Total; ?></td>
                      <td class="">
                      <?php echo " <a class='product-remove' href='delet_item.php?id={$row['pro_id']}'>Remove</a>";?>
                      </td>
                    </tr>
                    
                     
                  </tbody>
              <?php }} ?>
                </table>
            <a href="order_test.php"  class="btn btn-main pull-right">Checkout</a>
                
              <a href="index.php"  class="btn btn-main pull-left">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("includesp/public_footer.php"); ?>