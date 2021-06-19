<?php
   require 'includes/common.php';
   if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
    $email = $_SESSION['email'];
    $select_query = "SELECT * FROM users WHERE email = '$email'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
    $rows = mysqli_fetch_array($select_query_result);
    $user_id = $rows[0];

    $users_registration_query = "UPDATE users_items SET status = 'Confirmed' WHERE users_id = '$user_id'";
    $users_registration_submit = mysqli_query($con, $users_registration_query) or die(mysqli_error($con));
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Header -->
        <?php
            include 'includes/header.php';
        ?>
        <!--Header end-->

        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
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