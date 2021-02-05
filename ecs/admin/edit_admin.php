<?php
 
   include('includes/adminclass.php');
   $x = new Admin();
   $id =$_GET['id'];

    if(isset($_POST['submit'])){
      
        
    
    $x->admin_email     = $_POST['admin_email'];
    $x->admin_password  = $_POST['admin_password'];
    $x->full_name       = $_POST['full_name'];
    $q=$x->update($id);
    
    if($q){
        header("location:manage_admin.php");
        
    }
}       
        $data=$x->readById($id);
        $adminSet=$data[0];
       




?>
<?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Update Admin</h2>
        </div>
<form method="post">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Admin Email</label>
        <input class="form-control" type="email" name="admin_email" value="<?php echo $adminSet['admin_email'];?>" id="example-text-input" name="admin_email">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Admin Password</label>
        <input class="form-control" type="text" name="admin_password" value="<?php echo $adminSet['admin_password'];?>" id="example-search-input" name="admin_password">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Admin FullName</label>
        <input class="form-control" type="text" name="full_name" value="<?php echo $adminSet['full_name'];?>" id="example-email-input" name="full_name">
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Update</button>
</form>
</div>

<?php include("includes/home_footer.php");?>