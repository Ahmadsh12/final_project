<?php
    
   include('includes/productclass.php');
   
   $x = new Product();
   


 include("includes/home_header.php");?>

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
                    <th scope="col" class="sort" data-sort="name">Company name</th>
                    <th scope="col" class="sort" data-sort="name">Quantity</th>
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
                                                echo "<td>{$row['pro_id']}</td>";
                                                echo "<td>{$row['pro_name']}</td>";
                                                echo "<td>{$row['pro_desc']}</td>";
                                                echo "<td>{$row['pro_price']}</td>";
                                                echo "<td><img src='../vendor/img/pro/{$row['pro_image']}' width='100' height='100'></td>";
                                                echo "<td>{$row['cat_name']}</td>";
                                                echo "<td>{$row['av_comname']}</td>";
                                                echo "<td>{$row['pro_qty']}</td>";
                                                echo "<td><a href='delete_product.php?id={$row['pro_id']}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                echo "</tr>"; }  }
                        ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("includes/home_footer.php");?>