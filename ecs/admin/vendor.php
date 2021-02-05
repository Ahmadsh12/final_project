<?php include("includes/home_header.php");
include("../includesp/vendorclass.php");
$x = new vendor();
?>
<!-- Dark table -->
    <div class="m-5">
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">ON HOLD (Vendor)</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="name">vendor Name</th>
                    <th scope="col" class="sort" data-sort="name">Email</th>
                    <th scope="col" class="sort" data-sort="name">Password</th>
                    <th scope="col" class="sort" data-sort="name">Mobile</th>
                    <th scope="col" class="sort" data-sort="name">Company name</th>
                    <th scope="col" class="sort" data-sort="name">image</th>
                    <th scope="col" class="sort" data-sort="name">description</th>
                    <th scope="col" class="sort" data-sort="name">Accept</th>
                    <th scope="col" class="sort" data-sort="name">Reject</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                       <?php
                          if($data=$x->readAll()){
                         
                                        foreach ($data as $key => $value) {
                                            foreach ($value as $k => $v) {$row[$k]=$v;}         
                                                echo "<tr>";
                                                echo "<td>{$row['ven_id']}</td>";
                                                echo "<td>{$row['ven_name']}</td>";
                                                 echo "<td>{$row['ven_email']}</td>";
                                                echo "<td>{$row['ven_password']}</td>";
                                                echo "<td>{$row['ven_mobile']}</td>";
                                                echo "<td>{$row['ven_comname']}</td>";
                                                echo "<td><img src='../images/ven_img/{$row['ven_image']}' width='100' height='100'></td>";
                                                echo "<td>{$row['ven_desc']}</td>";
                                                echo "<td><a href='ven_accept.php?id={$row['ven_id']}' class='btn btn-primary btn-sm'>Accept</a></td>";
                                                echo "<td><a href='ven_reject.php?id={$row['ven_id']}' class='btn btn-danger btn-sm'>Reject</a></td>";
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