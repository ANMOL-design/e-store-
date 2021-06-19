<?php
    // PHP Default Function
    function check_if_added_to_cart($item_id){
        require 'common.php';
        $email = $_SESSION['email'];
        $select_query = "SELECT * FROM users WHERE email = '$email'";
        $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
        $rows = mysqli_fetch_array($select_query_result);
        $user_id = $rows[0];

        $select_query = "SELECT * FROM users_items WHERE items_id='$item_id' AND users_id ='$user_id' and status='Added to cart'";
        $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
 
        $rows = mysqli_num_rows($select_query_result);
        if($rows >= 1){
            return 1;          
            }
        else{
            return 0;
        }
    }
?>