<?php

include('../config/constants.php');

//1. get the id of admin to be deleted
 $id = $_GET['id'];
//2. Create SQL Queryto Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

// Check wheter the query is executed well
if($res==true)
{
  // echo "Admin Deleted";   
  $_SESSION['delete'] = "<div class= 'success'>Admin Deleted Successfully.</div>";
  header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
  // echo "Failed To delete Admin";
  $_SESSION['delete'] = "<div class= 'error'Failed To Delete Admin. Try Again Later.</div>";
  header('location:'.SITEURL.'admin/manage-admin.php');
}
//3. Redirect to Manage Admin Page with message (success/error)

?>