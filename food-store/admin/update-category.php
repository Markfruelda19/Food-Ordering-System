<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

         <br><br>

         <?php
         
         if(isset($_GET['id']))
         {
            //Get the id and all other details
            //echo "Getting the Data";
            $id = $_GET['id'];
            //Create sql query  to get all other detail
            $sql = "SELECT * FROM tbl_category WHERE id=$id";
            
            //Execute the query
            $res = mysqli_query($conn,  $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

              
            }
            else
            {
                // redirect to category with session message
                $_SESSION['no-category-found'] = "<div class = 'error'>Category Not Found.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }

         }
         else
         {
            //Redirect to Manage Category 
            header('location:'.SITEURL.'admin/manage-category.php');
         }
         
         ?>

    <form action="" method="POST" enctype="multipart/form-date">

         <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                      if($current_image != "")
                      {
                        //display the image
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width = "150px">
                        <?php
                      }
                      else{
                        //display the message
                        echo "<div class='error'>Image Not Added.</div>";
                      }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name= "image">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes

                    <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes

                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
                
            </tr>

         </table>

    </form> 

    <?php
    
         if(isset($_POST['submit']))
         {
            //echo "clicked";
            //1. get all the values from form
            $id = $_POST['id'];   
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //2.Updating Image if Selected
            if(isset($_FILES['image']['name']))
            {
                //Get the image details 
                $image_name = $_FILES['image']['name'];

                //checked whether image is available or not 
                if($image_name != "")
                {
                    //Image Available
                    

                    // A. Upload the New Image
                    
                    //Auto rename our image 
             // Get the extension of our image ex. (jpg) (png) (gif) e.g food1.jpg
             $ext = end(explode('.',$image_name));

             //Rename the image 
             $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g Food_Category_834.jpg

             $source_path = $_FILES['image']['tmp_name'];

             $destination_path = "../images/category/".$image_name;

             // Upload Image 
             $upload = move_uploaded_file($source_path, $destination_path);

             //check if the image were uploaded
             // And if the is not uploaded we will stop the process and redirect with error message
             if($upload==false)
             {
                //set message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                //Redirect to add Category Page 
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the process
                die();
             }

                    // B. Remove the cureent image if available
                    if($current_image!="")
                    {
                        $remove_path = "../images/category/".$current_image;

                        $remove = unlink($remove_path);
    
                        //Check if the image is remove or not 
                        // If failed to remove the display the message and stop the process
                        if($remove==false)
                        {
                             //Failed to remove image   
                             $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image.</div>";
                             header('location:'.SITEURL.'admin/manage-category.php');
                             die(); //Stop the Process
                        }
    
                    }
                    
                }
                else
                {
                    $image_name = $current_image;
                }
            }
            else
            {
                $image_name = $current_image;
            }

            //3. Update database
            $sql2 = "UPDATE tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id = '$id'
            ";
    
            //Execute the query
            $res2 = mysqli_query($conn, $sql2);

            //4.Redirect to Manage Category with Message
            // Check whether executed or not 
            if($res2==true)
            {
               //Category Updated
               $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
               header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
              //Failed to Update Category
              $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
               header('location:'.SITEURL.'admin/manage-category.php');
            }
         

         }

    ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>