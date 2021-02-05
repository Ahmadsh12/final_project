<?php
include('../includesp/customerclass.php');
$x = new customer();
$cust_name     = "";
$cust_email    = "";
$cust_password     = "";
$conpass   = "";
$cust_mobile   ="";
$cust_address  ="";
$error     =0;

if(isset($_POST['submit'])){
    $cust_name      = $_POST['cust_name'];
    $cust_email     = $_POST['cust_email'];
    $cust_password   = $_POST['cust_password'];
    $conpass       = $_POST['conpass'];
    $cust_mobile    =$_POST['cust_mobile'];
    $cust_address   =$_POST['cust_address'];
    

if ($cust_password != $conpass) 
    {  
       $errorcon=" * Password not match !!";
       $error=1;

    }
    if (! filter_var($cust_email,FILTER_VALIDATE_EMAIL)) 
    {
       $emailerror=" * Invaild email format";
       $error=1;
    }
    if ( ! preg_match("/^[A-Z][a-zA-Z0-9]+$/", $cust_password)) 
    {
       $errorpass=" * Password must start with upper case letter and contain letters and digits";
       $error=1;
    }
    if (empty($cust_mobile)|| strlen($cust_mobile)>10 || strlen($cust_mobile)<10) 
    {
       $errormobile=" * Mobile not vaild";
       $error=1;
    }
    if ($error == 0) 
    {   
      
        $x->cust_name      = $cust_name;
        $x->cust_email     = $cust_email;
        $x->cust_password  = $cust_password;
        $x->cust_mobile    = $cust_mobile;
        $x->cust_address   = $cust_address;
        $q=$x->create();
        if ($q) 
        {
            header("location:login_p.php");
        }   
    }         
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body" style="background-image: url('14.png');
background-repeat: no-repeat;
background-size: cover;
">

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center" style="border-radius: 20px; background-color: #f8f8ff;">
          <a class="logo" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="cust_name" value="<?php echo $cust_name;?>"  placeholder=" Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cust_email" value="<?php echo $cust_email;?>"  placeholder="Email">
              <?php if (isset($emailerror))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $emailerror </div>";}?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cust_password" value="<?php echo $cust_password;?>"  placeholder="Password">
              <?php if (isset($errorpass))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $errorpass </div>";}?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="conpass" value="<?php echo $conpass;?>" placeholder="confirm Password">
              <?php if (isset($errorcon))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $errorcon </div>";}?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cust_mobile" value="<?php echo $cust_mobile;?>"  placeholder="Mobile">
              <?php if (isset($errormobile))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $errormobile </div>";}?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cust_address" value="<?php echo $cust_address;?>"  placeholder="Address">
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-main text-center">Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>