<?php include("includesp/public_header.php");
include('vendor/includesv/productclass.php');
$e = new Product();
$pro_id=$_GET['pro_id'];
$av_id=$_GET['av_id'];
$cat_id=$_GET['cat_id'];
/*print_r($av_id);
die();*/
$ca=$e->readByIdp($cat_id);
$ca=$ca[0];
?>

<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<?php echo "<li><a href='product.php?cat_id={$ca['cat_id']}'>Products</a></li>";?>
					
				</ol>
			</div>
			
		</div>
<?php 
			$row=$e->readById($pro_id);
			$av=$e->readByIdav($av_id);
			
			$row=$row[0];
			$av=$av[0];
			
			/*print_r($row);
die(); */                     
/*if(isset($_POST['add'])){
	$_SESSION['cart'][$pro_id]=$_POST['product-quantity'];
}*/
            ?>
           
            	
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<?php echo "<img src='vendor/img/pro/{$row['pro_image']}' alt=''  />";?>
								</div>
								<div class='item'>
									<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' data-zoom-image="images/shop/single-products/product-2.jpg" />
								</div>
								
								<div class='item'>
									<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' data-zoom-image="images/shop/single-products/product-3.jpg" />
								</div>
								<div class='item'>
									<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' data-zoom-image="images/shop/single-products/product-4.jpg" />
								</div>
								<div class='item'>
									<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' data-zoom-image="images/shop/single-products/product-5.jpg" />
								</div>
								<div class='item'>
									<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' data-zoom-image="images/shop/single-products/product-6.jpg" />
								</div>
								
							</div>
							
							<!-- sag sol -->
							<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a>
						</div>
						
						<!-- thumb -->
						<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='1'>
								<img <?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='2'>
								<?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='3'>
								<?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='4'>
								<?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='5'>
								<?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='6'>
								<?php echo " src='vendor/img/pro/{$row['pro_image']}'";?> alt='' />
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo "{$row['pro_name']}";?></h2>
					<h4><?php echo "{$av['av_comname']}";?></h4>
					<p class="product-price"><?php echo "$ {$row['pro_price']}";?></p>
					
					<p class="product-description mt-20">
						<?php echo "{$row['pro_desc']}";?></p>
					
					<form method="post" action="shoping-cart.php">
					<div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input id="product-quantity" type="text" value="1" name="product-quantity">
						</div>
					</div>
										
					<?php echo "<button name='add' value='$pro_id' class='btn btn-main mt-20'>  Add To Cart</button>";?>
				</div>
				</form>

			</div>
		</div>
		
	</div>
</section>

<?php include("includesp/public_footer.php"); ?>