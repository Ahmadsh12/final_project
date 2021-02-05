<?php
    include("includesv/home_header.php");
   include('includesv/productclass.php');
   
   $x = new Product();
   $av_id=$_SESSION['v_id'];
   

    if(isset($_POST['submit'])){
      
        
    
    $x->pro_name    = $_POST['pro_name'];
    $x->pro_desc    = $_POST['pro_desc'];
    $x->pro_price   = $_POST['pro_price'];
    $x->pro_image   = $_FILES['pro_image']['name'];
    $tmp_name       =$_FILES['pro_image']['tmp_name'];
    $path           ='img/pro/';

    move_uploaded_file($tmp_name,$path.$x->pro_image);

    $x->cat_id       = $_POST['cat_id'];
    $x->av_id       = $_POST['av_id'];
    $x->pro_qty      = $_POST['pro_qty'];
    $q=$x->create();

    if($q){
        header("location:manage_products.php");
        
    }
}

 ?>

<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Create Products</h2>
        </div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Products Name</label>
        <input class="form-control" type="text" name="pro_name" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Products Description</label>
        <input class="form-control" type="text" name="pro_desc" id="example-search-input">
    </div>
     <div class="form-group">
        <label for="example-search-input" class="form-control-label">Products Price</label>
        <input class="form-control" type="text" name="pro_price" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Products Image</label>
        <input class="form-control" type="file" name="pro_image" id="example-email-input">
    </div>
       <div class="form-group">
        <label for="example-email-input" class="form-control-label">category</label>
        <select name="cat_id" id="select" class="form-control">
                                        <option value="0">Please select</option>
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
        <label for="example-email-input" class="form-control-label">av</label>
        <select name="av_id" id="select" class="form-control">
                                        <option value="0">Please select</option>
                                            <?php
                                             if ($data=$x->readAllvendors()){       
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                            /*echo "<pre>";
                         print_r($data);
                         die();*/
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
        <input class="form-control" type="text" name="pro_qty" id="example-search-input">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Save</button>
</form>
</div>
<!-- Dark table -->
     <div class="m-5">
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Products table</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Description</th>
                    <th scope="col" class="sort" data-sort="name">price</th>
                    <th scope="col" class="sort" data-sort="name">Image</th>
                    <th scope="col" class="sort" data-sort="name">Category ID</th>
                    <th scope="col" class="sort" data-sort="name">av</th>
                    <th scope="col" class="sort" data-sort="name">Quantity</th>
                    <th scope="col" class="sort" data-sort="name">Edit</th>
                    <th scope="col" class="sort" data-sort="name">Delete</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                        if ($data=$x->readByIdv($av_id)){
                          
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                                echo "<tr>";
                                                echo "<td>{$row['pro_id']}</td>";
                                                echo "<td>{$row['pro_name']}</td>";
                                                echo "<td>{$row['pro_desc']}</td>";
                                                echo "<td>{$row['pro_price']}</td>";
                                                echo "<td><img src='img/pro/{$row['pro_image']}' width='100' height='100'></td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td>{$row['av_comname']}</td>";
                                                echo "<td>{$row['pro_qty']}</td>";
                                               echo "<td><a href='edit_product.php?id={$row['pro_id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                                                echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                echo "</tr>"; }  }
                        ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php include("includesv/home_footer.php");?>