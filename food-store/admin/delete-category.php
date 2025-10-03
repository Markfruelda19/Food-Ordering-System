<?php
//Include Constants file 
include('../config/constants.php');

//echo "Delete Page";
//check whter the id and image_name value is set or not 
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    // Get the value and delete 
   // echo "Get Value and Delete";
   $id = $_GET['id'];
   $image_name = $_GET['image_name'];

   // remove the physical image file is 
   if($image_name != "")
   {
     // Image is aveilable so remove it 
     $path = "../images/category/".$image_name;
     //Remove the image
     $remove = unlink($path);

      //If failed to remove image then add an error message and stop the process
     if($remove==false)
     {
        //set the session message
        $_SESSION['remove'] = "<div class= 'error'>Failed to Remove Category Image.</div>";
        //redirect to manage category
        header('location:'.SITEURL.'admin/manage-category.php');
        //stop the process
        die();
     }
   }

   //Delete data from database
   // Sql Query to delete data from DAtabase
   $sql = "DELETE FROM tbl_category WHERE id=$id";

   //Execute the Query
   $res = mysqli_query($conn, $sql);

   //Check the data is delete from the database or not 
   if($res==true)
   {
      // set success message 
      $_SESSION['delete'] = "<div class= 'success'>Category Deleted Successfully.</div>";
      header('location:'.SITEURL.'admin/manage-category.php');
   }
   else
   {
     // set fail message    
     $_SESSION['delete'] = "<div class= 'error'>Failed to Delete Category.</div>";
      header('location:'.SITEURL.'admin/manage-category.php');
   }

   //Redirect to manage categorypage with Message

}
else
{
    // redirect to manage category page 
    header('location:'.SITEURL.'/admin/manage-category.php');
}

?>