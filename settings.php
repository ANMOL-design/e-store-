<?php
   require 'includes/common.php';
   if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Header -->
        <?php
            include 'includes/header.php';
        ?>
        <!--Header end-->

        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Old Password" required>
                            <div><?php
                                    if(isset($_GET['password_errors'])){
                                        echo "Incorrect Old Password";
                                    } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" required = "true" pattern=".{8,}">
                            <div><?php
                                    if(isset($_GET['password_error'])){
                                        echo "Length of Password is at-least 8 characters";
                                    } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1"  placeholder="Re-type New Password" required = "true" pattern=".{8,}">
                            <div><?php
                                    if(isset($_GET['password_error'])){
                                        echo "Incorrect Re-type Password";
                                    } ?>
                            </div>
                
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
         <!--Footer-->
         <?php
           include 'includes/footer.php';
         ?>
        <!--Footer end-->
    </body>
</html>