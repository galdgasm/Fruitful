<?php 
include "header.php";
include"../user/connection.php";
$id=$_GET["id"];
$category_name="";
$product_name="";
$packing_size="";
$res=mysqli_query($link,"select * from products where id=$id");
while($row=mysqli_fetch_array($res))
{
  $category_name=$row["category_name"];
  $product_name=$row["product_name"];
  $packing_size=$row["packing_size"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <div id="content-header">
        <div id="breadcrumb" style="margin-left: 100px; margin-top: 1px"><a href="add_products.php" title="Go to Users" class="tip-bottom">
            Products</a></div>
    </div>
    <div id="content-header">
        <div id="breadcrumb" style="margin-left: 170px; margin-top: 1px"><a title="Go to Users" class="tip-bottom">
            Edit Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Products</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Category:</label>

              <div class="controls">
                <select class="span11" name="category_name">
                  <?php
                  $res=mysqli_query($link,"select * from products");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <option <?php if($row["category_name"]==$category_name) {echo "selected";} ?>>
                    <?php
                    echo $row["category_name"];
                    echo "</option>";

                  }

                   ?>
                </select>
                
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Enter Product Name:</label>

              <div class="controls">
               <input type="text" name="product_name" class="span11" placeholder="Enter Product Name" value="<?php echo $product_name; ?>">
                
              </div>
            </div>


             <div class="control-group">
              <label class="control-label">Enter Quantity:</label>

              <div class="controls">
               <input type="text" name="packing_size" class="span11" placeholder="Enter Quantity" value="<?php echo $packing_size ?>">
                
              </div>
            </div>


            
            <div class="alert alert-danger" id="error" style="display: none">
             This Product already exist!
            </div>


            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none">
             Record Updated Successfully!
            </div>

             
          </form>
        </div>
      </div>     
    </div>
        </div>

    </div>
</div>


<?php
if(isset($_POST["submit1"])) 
{
  $count=0;
  $res=mysqli_query($link,"select * from products where category_name='$_POST[category_name]' && product_name='$_POST[product_name]' && packing_size='$_POST[packing_size]'") or die(mysqli_error($link));
  $count=mysqli_num_rows($res);

  if($count>0)
  {
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
    </script> 
    <?php
  }
  else{
    //mysqli_query($link, "insert into products values(NULL,'$_POST[category_name]', '$_POST[product_name]', '$_POST[packing_size]' )") or die(mysqli_error($link));
    mysqli_query($link, "update products set category_name='$_POST[category_name]', product_name='$_POST[product_name]', packing_size='$_POST[packing_size]' where id=$id");

    ?>
    <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
            window.location="add_products.php";
        },1000);

    </script>
    <?php
  }


}
?>

<?php
include "footer.php";
?>