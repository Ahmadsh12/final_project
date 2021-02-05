 <?php
    
   include('includes/categoryclass.php');
   $x = new category();
   $id =$_GET['id'];
   $data=$x->readById($id);
   $categorySet=$data[0];
    if(isset($_POST['submit'])){
      
        
    
    $x->cat_name    = $_POST['cat_name'];
    $x->cat_desc    = $_POST['cat_desc'];
    if ($_FILES['cat_image']['name']){
        $x->cat_image      = $_FILES['cat_image']['name'];
        }
        else{
        $x->cat_image      = $categorySet['cat_image'];}
        $tmp_name      =$_FILES['cat_image']['tmp_name'];
        $path          ='img/cat/';

        move_uploaded_file($tmp_name,$path.$x->cat_image);
    
    $q=$x->update($id);
    
    if($q){
        header("location:manage_category.php");
        
    }
}


    
 ?>

<?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Update Category</h2>
        </div>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Category Name</label>
        <input class="form-control" type="text" name="cat_name" id="example-text-input" value="<?php echo $categorySet['cat_name'];?>"/>
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Category Description</label>
        <input class="form-control" type="text" name="cat_desc" value="<?php echo $categorySet['cat_desc'];?>" id="example-search-input">
    </div> 
     <div class="form-group">
        <label for="example-email-input" class="form-control-label">Category Image <?php
                             echo "<img src='img/cat/{$categorySet['cat_image']}' width='100' height='100'>";
                             ?></label>
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Category Image</label>
        <input class="form-control" type="file" name="cat_image" id="example-email-input">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Update</button>
</form>
</div>

<?php include("includes/home_footer.php");?>