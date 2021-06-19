<?php
   require 'includes/common.php';

   $email = $_POST['e-mail'];
   $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    
   if (!preg_match($regex_email, $email)) {
        header('location: signup.php?email_error=enter correct email');
    }
    $password = $_POST['password'];
    if (strlen($password) < 7) {
        header('location: signup.php?password_error=enter correct password');
    }

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $email);
    $password = md5(mysqli_real_escape_string($con, $password));
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $select_query = "SELECT email FROM users WHERE email = '$email'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
    $rows = mysqli_num_rows($select_query_result);
    //echo $rows;
    if($rows > 0){
        echo "<center><h3>Email Id already exists.<br> Try  Another <a href = 'signup.php'>E-mail ID</a></h3></center>";
        //header('location: login.php');
    }
    else{
        $users_registration_query = "insert into users(name, email, password, contact, city, address) values ('$name', '$email', '$password', '$contact', '$city', '$address')";
        $users_registration_submit = mysqli_query($con, $users_registration_query) or die(mysqli_error($con));
        $_SESSION['email'] = $email;
        $_SESSION['id'] = mysqli_insert_id($con);
        echo "<h2>Successful SignIn | We are Redirect to Products Page</h2>";
        header('location: products.php');
    }

?>