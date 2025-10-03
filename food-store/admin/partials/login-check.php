<?php
    
    // Authorization - Access Control
    // check if the user is logged in or not 
    if(!isset($_SESSION['user'])) //IF uesr session is not set 
    {
         //User is not logged in
        // redirect to log in page with message 
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please log in to access Admin Panel.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }


?>