<?php
include('../includesp/vendorClass.php');
$x = new vendor();
$ven_name     = "";
$ven_email    = "";
$ven_pass     = "";
$conpass   = "";
$ven_mobile   ="";
$ven_comname  ="";
$ven_desc     ="";
$error     =0;

 if(isset($_POST['submit'])){
    $ven_name      = $_POST['ven_name'];
    $ven_email     = $_POST['ven_email'];
    $ven_pass      = $_POST['ven_pass'];
    $conpass       = $_POST['conpass'];
    $ven_mobile    =$_POST['ven_mobile'];
    $ven_comname   =$_POST['ven_comname'];
    $ven_desc      =$_POST['ven_desc'];

    if ($ven_pass != $conpass) 
    {  
       $errorcon="  Password not match !!";
       $error=1;

    }
    if (! filter_var($ven_email,FILTER_VALIDATE_EMAIL)) 
    {
       $emailerror="  Invaild email format";
       $error=1;
    }
    if ( ! preg_match("/^[A-Z][a-zA-Z0-9]+$/", $ven_pass)) 
    {
       $errorpass="  Password must start with upper case letter and contain letters and digits";
       $error=1;
    }
    if (empty($ven_mobile)|| strlen($ven_mobile)>10 || strlen($ven_mobile)<10) 
    {
       $errormobile="  Mobile not vaild";
       $error=1;
    }
    if ($error == 0) 
    {   
      
        $x->ven_name      = $ven_name;
        $x->ven_email     = $ven_email;
        $x->ven_password  = $ven_pass;
        $x->ven_mobile    = $ven_mobile;
        $x->ven_comname   = $ven_comname;
        $x->ven_image     = $_FILES['ven_image']['name'];
        $tmp_name         = $_FILES['ven_image']['tmp_name'];
        $path             ='../images/ven_img/'; 
        $x->ven_desc      = $ven_desc;   
        move_uploaded_file($tmp_name,$path.$x->ven_image);
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

<body id="body" style="background-image: url('13.jpg');
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
          <form class="text-left clearfix" action="" method="post" enctype='multipart/form-data'>
            <div class="form-group">
              <input type="text" class="form-control" name="ven_name" value="<?php echo $ven_name;?>" placeholder="vendor Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ven_email" value="<?php echo $ven_email;?>" placeholder="Email">
              <?php if (isset($emailerror))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $emailerror </div>";}?>
              
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ven_pass" value="<?php echo $ven_pass;?>" placeholder="Password">
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
              <input type="text" class="form-control" name="ven_mobile" value="<?php echo $ven_mobile;?>" placeholder="Mobile">
              <?php if (isset($errormobile))
                                { echo " 
              <div class='alert alert-danger alert-common' role='alert'><i class='tf-ion-close-circled'></i><span>Warning!</span>  $errormobile </div>";}?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ven_comname" value="<?php echo $ven_comname;?>" placeholder="company name">
            </div>
            <div class="form-group">
              <input type="File" class="form-control" name="ven_image" placeholder="Brand image">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ven_desc" value="<?php echo $ven_desc;?>" placeholder="Description">
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