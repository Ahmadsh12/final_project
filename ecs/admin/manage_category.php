<?php
    
   include('includes/categoryclass.php');
   $x = new category();

    if(isset($_POST['submit'])){
      
        
    
    $x->cat_name    = $_POST['cat_name'];
    $x->cat_desc    = $_POST['cat_desc'];
    $x->cat_image   = $_FILES['cat_image']['name'];
    $tmp_name       =$_FILES['cat_image']['tmp_name'];
    $path           ='img/cat/';

    move_uploaded_file($tmp_name,$path.$x->cat_image);
    
    $q=$x->create();
    
    if($q){
        header("location:manage_category.php");
        
    }
}
 ?>
<?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Create Category</h2>
        </div>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Category Name</label>
        <input class="form-control" type="text" value="" id="example-text-input"  name="cat_name">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Category Description</label>
        <input class="form-control" type="text" value="" id="example-search-input" name="cat_desc">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Category Image</label>
        <input class="form-control" type="file" value="" id="example-email-input" class="form-control" name="cat_image">
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
              <h3 class="text-white mb-0">Category table</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Description</th>
                    <th scope="col" class="sort" data-sort="name">Image</th>
                    <th scope="col" class="sort" data-sort="name">Edit</th>
                    <th scope="col" class="sort" data-sort="name">Delete</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                        if ($data=$x->readAll()){
                          
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                                echo "<tr>";
                                                echo "<td>{$row['cat_id']}</td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td>{$row['cat_desc']}</td>";
                                                echo "<td><img src='img/cat/{$row['cat_image']}' width='100' height='100'></td>";
                                               echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                                                echo "<td><a href='delete_category.php?id={$row['cat_id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                echo "</tr>"; }  }
                        ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("includes/home_footer.php");?>