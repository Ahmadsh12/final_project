<?php
    
   include('includesv/productclass.php');
   
   $x       = new Product();
   $id      =$_GET['id'];
   

    if(isset($_POST['submit'])){
      
        
    
    $x->pro_name     = $_POST['pro_name'];
    $x->pro_desc     = $_POST['pro_desc'];
    $x->pro_price    = $_POST['pro_price'];
    $x->pro_image    = $_POST['pro_image'];
    $x->cat_id       = $_POST['cat_id'];
    $x->av_id        = $_POST['av_id'];
    $x->pro_qty      = $_POST['pro_qty'];
    

    $q=$x->update($id);
    
    if($q){
        header("location:manage_products.php");
        
    }
}

    $data=$x->readById($id);
    $productSet=$data[0];
 ?>

<?php include("includesv/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Update Products</h2>
        </div>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Products Name</label>
        <input class="form-control" type="text" name="pro_name" value="<?php echo $productSet['pro_name'];?>" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Products Description</label>
        <input class="form-control" type="text" name="pro_desc" value="<?php echo $productSet['pro_desc'];?>" id="example-search-input">
    </div>
     <div class="form-group">
        <label for="example-search-input" class="form-control-label">Products Price</label>
        <input class="form-control" type="text" name="pro_price" value="<?php echo $productSet['pro_price'];?>" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Products Image <?php
                             echo "<img src='img/cat/{$productSet['pro_image']}' width='100' height='100'>";
                             ?></label>
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Products Image</label>
        <input class="form-control" type="file" value="<?php echo $productSet['pro_image'];?>" name="pro_image" id="example-email-input">
    </div>
      <div class="form-group">
        <label for="example-search-input" class="form-control-label">Category ID</label>
        <select name="cat_id" class="form-control">
          <option value="0">Default select</option>
          <?php
                                             if ($data=$x->readAllcategory()){       
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                            
                                            $i=$row['cat_id'];
                                            echo "<option value=$i>";
                                            echo "{$row['cat_name']}";
                                            echo "</option>";

                                            }
                                        }
                                             ?>
        </select>
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">av ID</label>
        <select name="av_id" class="form-control">
          <option value="0">Default select</option>
          <?php
                                             if ($data=$x->readAllvendors()){       
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                            
                                            $i=$row['av_id'];
                                            echo "<option value=$i>";
                                            echo "{$row['av_comname']}";
                                            echo "</option>";

                                            }
                                        }
                                             ?>
        </select>
    </div>
      <div class="form-group">
        <label for="example-search-input" class="form-control-label">Products Quantity</label>
        <input class="form-control" type="text" name="pro_qty" value="<?php echo $productSet['pro_qty'];?>" id="example-search-input">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Update</button>
</form>
</div>

<?php include("includesv/home_footer.php");?>