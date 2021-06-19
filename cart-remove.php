<?php
   require 'includes/common.php';
   if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$email = $_SESSION['email'];
$select_query = "SELECT * FROM users WHERE email = '$email'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
$rows = mysqli_fetch_array($select_query_result);
$user_id = $rows[0];

$item_id = $_GET['id'];

$users_registration_query = "DELETE FROM users_items WHERE users_id = '$user_id' AND items_id = '$item_id'";
$users_registration_submit = mysqli_query($con, $users_registration_query) or die(mysqli_error($con));
    
header('location: cart.php'); 
?>
