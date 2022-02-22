<?php 
include "header.php";
include "../user/connection.php"
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">            
            <div class="card" style="width: 18rem; border-style: solid; border-width: 1px; border-radius: 10px; float: left; background-color:#FFCD9B">
                <div class="card-body">
                    <h3 class="card-title text-center">No. of products</h3>
                    <h1 class="card-text text-center"> 
                    <?php
                    $count=0;
                    $res=mysqli_query($link,"select * from products");
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>                       
                    </h1>
                </div>
            </div>     

             <div class="row-fluid" style="background-color: white; min-height: 1000px;">            
            <div class="card" style="width: 18rem; border-style: solid; border-width: 1px; border-radius: 10px; float: left; margin-left:25px; margin-bottom: 50px; background-color:#98fb98">
                <div class="card-body">
                    <h3 class="card-title text-center">No. of Users</h3>
                    <h1 class="card-text text-center"> 
                    <?php
                    $count=0;
                    $res=mysqli_query($link,"select * from user_registration");
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>                       
                    </h1>
                </div>
            </div>  

             <div class="widget-content nopadding" style="margin-top:10px;">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Product Category</th>
                  <th>Product Variety</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $res=mysqli_query($link,"select * from products");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                     <tr>
                  <td><?php echo $row["category_name"]; ?></td>
                  <td><?php echo $row["product_name"]; ?></td>
                  <td><?php echo $row["packing_size"]; ?></td>  


                </tr>
                    <?php
                }

               ?>
              </tbody>
            </table>
          </div>       

        </div>

    </div>
</div>

<?php
include "footer.php";
?>