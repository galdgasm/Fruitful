<?php 
include "header.php";
include"../user/connection.php";
$id=$_GET["id"];
$product_main="";
$res=mysqli_query($link,"select * from category where id=$id");
while($row=mysqli_fetch_array($res))
{
  $product_main=$row["product_main"];
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
        <div id="breadcrumb" style="margin-left: 100px; margin-top: 1px;"><a href="add_category.php" title="Go to Categories" class="tip-bottom">
            Categories</a></div>
    </div>
    <div id="content-header">
        <div id="breadcrumb" style="margin-left: 180px; margin-top: 1px;"><a title="Edit Category" class="tip-bottom">
            Edit Category</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Category</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Category Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Category name" name="product_main" value=<?php echo $product_main; ?>>
              </div>
            </div>
              
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Update</button>
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
    mysqli_query($link, "update category set product_main='$_POST[product_main]' where id=$id") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function(){
            window.location="add_category.php";
        },1000);

    </script>
    <?php
}
?>

<?php
include "footer.php";
?>