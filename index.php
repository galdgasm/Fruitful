<?php
include "../user/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <div class="title" style="text-align: center; font-size: 70px; font-weight: bold; margin-top: 45px; padding-bottom: 30px;">
        <p>
  <span style='color: #FFE5B4'>F</span>
  <span style='color: white'>r</span>
  <span style='color: white'>u</span>
  <span style='color: white'>i</span>
  <span style='color: white'>t</span>
  <span style='color: white'>f</span>
  <span style='color: white'>u</span>
  <span style='color: white'>l</span>
</p>
        
    </div>

<div id="loginbox">
    <form name="form1" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Admin Login</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Username" name="username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                                                                                      placeholder="Password" name="password" required/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <center>
        <input type="submit" name="submit1" value="Login" class="btn btn-success"/>
            </center>
        </div>
    </form>

    <?php
    if(isset($_POST["submit1"]))
    {
        $username=mysqli_real_escape_string($link,$_POST["username"]);
        $password=mysqli_real_escape_string($link,$_POST["password"]);

        $count=0;
        $res=mysqli_query($link,"select * from user_registration where username= '$username' && password='$password' && role='admin' && status='active'");
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            ?>
            <script type="text/javascript">
                window.location="dashboard.php";
            </script>
            <?php
        }
        else{
            ?>
            <div class="alert alert-danger">
             Invalid username or password.
            </div>
            <?php
        } 

       
    }
    ?>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
