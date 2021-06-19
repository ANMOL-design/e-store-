<?php
   // Connection established
   require 'includes/common.php';
   if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

   $old_password = md5(mysqli_real_escape_string($con, $_POST['old-password']));
   $password =  md5(mysqli_real_escape_string($con,$_POST['password']));
   $password1 = md5(mysqli_real_escape_string($con,$_POST['password1']));

    $email = $_SESSION['email'];
    if (strlen($password) < 7) {
        header('location: signup.php?password_error=enter correct password');
    }

   
    $select_query = "SELECT password FROM users WHERE email = '$email'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
    $p = mysqli_fetch_array($select_query_result);

    if($p[0] != $old_password){
        echo "<h2>Old Password is Wrong | Try with another password</h2>";
        header('location: settings.php?password_errors=enter correct retype password');
       // header('location: settings.php?success=enter correct retype password');
    }
    else{
        if (strlen($password) != strlen($password1)) {
            header('location: settings.php?password_error=enter correct retype password');
        }
        else{
            $users_registration_query = "UPDATE users SET password = '$password' WHERE email = '$email'";
            $users_registration_submit = mysqli_query($con, $users_registration_query) or die(mysqli_error($con));

            echo "<h2><center>Password Updation Successful</center></h2>";
            echo "<h3><center>Redirect to <a href= 'products.php'>Products Page</center></h3>";
    
       // header('location: settings.php?success=enter correct retype password');
        
        }
    }
?>