<?php
 
   include('includes/customerclass.php');
   $x = new customer();
   $id =$_GET['id'];
   $data=$x->readById($id);
   $customerSet=$data[0];

        if(isset($_POST['submit'])){
           /* echo "<pre>";
            print_r($_POST);
           print_r($_FILES);
            

            die();
*/
      
        $x->cust_name      = $_POST['cust_name'];
        $x->cust_email      = $_POST['cust_email'];
        $x->cust_password  = $_POST['cust_password'];
        $x->cust_mobile   = $_POST['cust_mobile'];
        $x->cust_address     = $_POST['cust_address'];
  
        $q=$x->update($id);
    
        if($q){
        header("location:manage_customers.php");
        }
        
}
    
        
       




?>
<?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Update Customers</h2>
        </div>
<form method="post">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Customers Name</label>
        <input class="form-control" type="text" name="cust_name" value="<?php echo $customerSet['cust_name'];?>" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Customers Email</label>
        <input class="form-control" type="email" name="cust_email" value="<?php echo $customerSet['cust_email'];?>" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers password</label>
        <input class="form-control" type="text" name="cust_password" value="<?php echo $customerSet['cust_password'];?>" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers mobile</label>
        <input class="form-control" type="text" name="cust_mobile" value="<?php echo $customerSet['cust_mobile'];?>" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers Address</label>
        <input class="form-control" type="text" name="cust_address" value="<?php echo $customerSet['cust_address'];?>" id="example-email-input">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Update</button>
</form>
</div>

<?php include("includes/home_footer.php");?>