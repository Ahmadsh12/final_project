<?php 

include("includesv/home_header.php");


   include('includesv/venedclass.php');
   $x = new vened();
   $id =$_SESSION['v_id'];
   
   $q=$x->readById($id);
   $q=$q[0];

    
    $x->av_name = $q['av_name'];
    $x->av_email = $q['av_email'];
    $x->av_pass = $q['av_pass'];
    $x->av_mobile = $q['av_mobile'];
    $x->av_comname = $q['av_comname'];
    $x->av_image = $q['av_image'];
    $x->av_desc = $q['av_desc'];


 ?>

<div class="main-content" id="panel">
    
    
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../admin/img/bg/1-2.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $q['av_name'];?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your Products</p>
            <a href="../vendor/edit_vendor.php" class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-6 order-xl-8 container">
          <div class="card card-profile">
            <img src="../admin/img/bg/1-3.jpg " alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <?php echo "<img src='../images/ven_img/{$q['av_image']}' width='100' height='100' class='rounded-circle'>";?>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <!-- <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <?php echo $q['av_comname'];?><span class="font-weight-light"></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $q['av_email'];?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $q['av_desc'];?>
                </div>
                <div>
                  <!-- <i class="ni education_hat mr-2"></i>University of Computer Science -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
  <?php include("includesv/home_footer.php");  ?>