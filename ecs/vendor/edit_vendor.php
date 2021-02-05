<?php
ob_start(); 
include("includesv/home_header.php");
include('includesv/venedclass.php');
   $x = new vened();
   $id =$_SESSION['v_id'];
   
   $q=$x->readById($id);
   $q=$q[0];

    if(isset($_POST['submit'])){
    $x->av_name = $_POST['av_name'];
    $x->av_email = $_POST['av_email'];
    $x->av_pass = $_POST['av_pass'];
    $x->av_mobile = $_POST['av_mobile'];
    $x->av_comname = $_POST['av_comname'];
    if ($_FILES['av_image']['name']){
        $x->av_image      = $_FILES['av_image']['name'];
        }
        else{
        $x->av_image      = $q['av_image'];}
        $tmp_name      =$_FILES['av_image']['tmp_name'];
        $path          ='../images/ven_img';

        move_uploaded_file($tmp_name,$path.$x->av_image);
    $x->av_desc = $_POST['av_desc'];
    $q=$x->update($id);
    if($q){
        header("location:../vendor/vendor_prof.php");
        
    }
  }
    ?>
<div class="main-content" id="panel">
   
    
      <div class="row m-5">
        
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-4">Vendor information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Vendor name</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" name="av_name" value="<?php echo $q['av_name'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" placeholder="" name="av_email" value="<?php echo $q['av_email'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Password</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="" name="av_pass" value="<?php echo $q['av_pass'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mobile</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="" name="av_mobile" value="<?php echo $q['av_mobile'];?>">
                      </div>
                    </div>
                    </div>
                  </div>
                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Company name</label>
                        <input type="text" id="input-username" class="form-control" placeholder="" name="av_comname" value="<?php echo $q['av_comname'];?>">
                      </div>
                    </div>
                   <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Description</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="" name="av_desc" value="<?php echo $q['av_desc'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                      <div class="form-group">
                        <?php echo "<img src='../images/ven_img/{$q['av_image']}' width='100' height='100' class='rounded-circle'>";?>
                      </div>
                      <div class="form-group">
                        
                        <input type="file" id="input-email" class="form-control" placeholder="" name="av_image" value="<?php echo $q['av_image'];?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <button type="submit" name="submit" class="btn btn-primary">Updat</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
     
    
  
      
<?php include("includesv/home_footer.php"); ob_end_flush();?>