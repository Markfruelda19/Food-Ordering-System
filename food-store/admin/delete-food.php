<?php

include('../config/constants.php');

//echo "Delete Food Page";

//Either you can use && or AND
if (isset($_GET['id']) && isset($_GET['image_name']))
{
    //echo "Process to Delete";

    //1.Get id, Image name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //2.Remove the image if available
    if($image_name != "")
    {
        $path = "../images/food/".$image_name;
        $remove = unlink($path);

        if($remove==false)
        {
            $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');

            die();
        }
    }

    //3.Delete Food from database
     $sql = "DELETE FROM tbl_food WHERE id=$id";

     $res = mysqli_query($conn, $sql);

     //4.Redirect to Manage Food with Seession Message
     if($res==true)
     {
        //Food Deleted
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
     }
     else
     {
        //Failed to Delete Food
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food. Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
     }

}
else
{
   //echo "Redirect";
   $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
   header('location:'.SITEURL.'admin/manage-food.php');
}

?>