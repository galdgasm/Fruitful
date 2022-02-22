
<?php
include "header.php";
include"../user/connection.php";
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <div id="content-header">
        <div id="breadcrumb" style="margin-left: 100px; margin-top: 1px"><a href="dashboard.php" title="Go to Categories" class="tip-bottom">
            Categories</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Category</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Category Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Category name" name="product_main" />
              </div>
            </div>
            
            <div class="alert alert-danger" id="error" style="display: none">
             This Category already exist!
            </div>


            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display: none">
             Record Saved Successfully!
            </div>

             
          </form>
        </div>


      </div>

      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $res=mysqli_query($link,"select * from category");
                while($row=mysqli_fetch_array($res))
                {
                    ?>
                     <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["product_main"]; ?></td>
                  <td><center>
                    <a href="edit_category.php?id=<?php echo $row["id"]; ?>" style="color:green">Edit</a></center></td>
                  <td><center><a href="delete_category.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a></center></td>           
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
</div>


<?php
if(isset($_POST["submit1"])) 
{
  $count=0;
  $res=mysqli_query($link,"select * from category where product_main='$_POST[product_main]'");
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
    mysqli_query($link, "insert into category values(NULL,'$_POST[product_main]')") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
            window.location.href=window.location.href;
        },1000);

    </script>
    <?php
  }


}
?>

<?php
include "footer.php";
?>