<?php
   // Connection established
   require 'includes/common.php';

   //Store the login form data into variables.
   //Use mysqli_real_escape_string function for security. 
   // Use MD5 function for password value.

   $email = mysqli_real_escape_string($con, $_POST['e-mail']);
   $password =  md5(mysqli_real_escape_string($con,$_POST['password']));

   // The select query to fetch id and email from the users where email and password are the values entered by the user in the login form
    $select_query = "SELECT email, password FROM users WHERE email = '$email' and password = '$password'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
    $rows = mysqli_num_rows($select_query_result);
    if($rows == 0){
        echo "<center><h2>Email ID or Password is incorrect<br> Try to <a href= 'login.php'>Login Again</a></h2></center>";
        //header('location: login.php');
    }
    else{
        $row = mysqli_fetch_array($select_query_result);
        $_SESSION['email'] = $email;
        $_SESSION['id'] = mysqli_insert_id($con);
        echo "<h2>Successful Login | Redirect to Products Page</h2>";
        header('location: products.php');
    }
?>