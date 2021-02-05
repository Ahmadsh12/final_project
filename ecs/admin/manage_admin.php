<?php
    
   include('includes/adminclass.php');
   $x = new Admin();

    if(isset($_POST['submit'])){
      
        
    
    $x->admin_email     = $_POST['admin_email'];
    $x->admin_password  = $_POST['admin_password'];
    $x->full_name       = $_POST['full_name'];
    $q=$x->create();
    
    if($q){
        header("location:manage_admin.php");
        
    }
}
 ?>
 <?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Create Admin</h2>
        </div>
<form action=""  method="post">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Admin Email</label>
        <input class="form-control" type="email"   name="admin_email">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Admin Password</label>
        <input class="form-control" type="text"  name="admin_password">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Admin FullName</label>
        <input class="form-control" type="text"  name="full_name">
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit"  name="submit">Save</button>
</form>
</div>
<!-- Dark table -->
    <div class="m-5">
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Admin table</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Password</th>
                    <th scope="col" class="sort" data-sort="name">FullName</th>
                    <th scope="col" class="sort" data-sort="name">Edit</th>
                    <th scope="col" class="sort" data-sort="name">Delete</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                       <?php
                          if($data=$x->readAll()){
                                         /* echo "<pre>";
                                          print_r($data);
                                          die();*/
                                        foreach ($data as $key => $value) 

                                        {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}         
                                                echo "<tr>";
                                                echo "<td>{$row['admin_id']}</td>";
                                                 echo "<td>{$row['admin_email']}</td>";
                                                echo "<td>{$row['admin_password']}</td>";
                                                echo "<td>{$row['full_name']}</td>";
                                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                                                echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                          }
                                             ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("includes/home_footer.php");?>