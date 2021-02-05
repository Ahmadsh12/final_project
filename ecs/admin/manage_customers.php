 <?php
    
   include('includes/customerclass.php');
   $x = new customer();

    if(isset($_POST['submit'])){
      
        $x->cust_name        = $_POST['cust_name'];
        $x->cust_email       = $_POST['cust_email'];
        $x->cust_password    = $_POST['cust_password'];
        $x->cust_mobile      = $_POST['cust_mobile'];
        $x->cust_address     = $_POST['cust_address'];
        $q=$x->create();
    
        if($q){
        header("location:manage_customers.php");
        }
}


 ?>
<?php include("includes/home_header.php");?>
<div class="m-5">
  <div class="main-sparkline12 text-center">
            <h2>Create Customers</h2>
        </div>
<form method="post">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Customers Name</label>
        <input class="form-control" type="text" name="cust_name" id="example-text-input">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Customers Email</label>
        <input class="form-control" type="email" name="cust_email" id="example-search-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers password</label>
        <input class="form-control" type="password" name="cust_password" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers mobile</label>
        <input class="form-control" type="text" name="cust_mobile" id="example-email-input">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Customers Address</label>
        <input class="form-control" type="text" name="cust_address" id="example-email-input">
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
              <h3 class="text-white mb-0">Customers table</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Password</th>
                    <th scope="col" class="sort" data-sort="name">Mobile</th>
                    <th scope="col" class="sort" data-sort="name">Address</th>
                    <th scope="col" class="sort" data-sort="name">Edit</th>
                    <th scope="col" class="sort" data-sort="name">Delete</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                          if($data=$x->readAll()){
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}
                                                echo "<tr>";
                                                echo "<td>{$row['cust_id']}</td>";
                                                echo "<td>{$row['cust_name']}</td>";
                                                echo "<td>{$row['cust_email']}</td>";
                                                echo "<td>{$row['cust_password']}</td>";
                                                echo "<td>{$row['cust_mobile']}</td>";
                                                echo "<td>{$row['cust_address']}</td>";
                                                echo "<td><a href='edit_customer.php?id={$row['cust_id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                                                echo "<td><a href='delete_customer.php?id={$row['cust_id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                echo "</tr>";
                                              } }
                        ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("includes/home_footer.php");?>