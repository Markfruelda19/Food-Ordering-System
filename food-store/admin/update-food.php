<?php include('partials/menu.php'); ?>

<?php
          //check if id is set or not
          if(isset($_GET['id']))
          {
                //get all the details 
                $id = $_GET['id'];
                // sql query to get the selected foof
                $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
      
                $res2 = mysqli_query($conn, $sql2);
      
                // Get the value based on query exectued
                $row2 = mysqli_fetch_assoc($res2);
      
                // Get the individual values of selected food
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $current_image = $row2['image_name'];
                $current_category = $row2['category_id'];
                $featured = $row2['featured'];
                $active = $row2['active'];
              
                
              
               
      
          }
          else
          {
                //Redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
          }

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food Page</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-date">

         <table class="tbl-30">

             <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>" >
                </td>
             </tr>

             <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description"  cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
             </tr>

             <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
             </tr>

             <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                       if($current_image == "")
                       {
                            //Image Available
                            echo "<div class='error'>Image Not Available.</div>";
                       }
                       else
                       {
                           //Image not Available
                           ?>
                           <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                           <?php
                       }
                    ?>
                </td>
             </tr>

             <tr>
                <td>Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
             </tr>

             <tr>
                <td>Category: </td>
                <td>
                    <select name="category" >

                    <?php
                        //Query to get active categories
                        $sql ="SELECT * FROM tbl_category WHERE active='Yes'";
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                           //category available
                           while($row = mysqli_fetch_assoc($res))
                           {
                            $category_title = $row['title'];
                            $category_id = $row['id'];
                            
                            //echo "<option value = '$category_id'>$category_title</option>";
                            ?>
                            <option <?php if($current_category==$category_id){echo "Selected";} ?>value=""><?php echo $category_id;?><?php echo $category_title; ?></option>
                            <?php

                           }
                        }
                        else
                        {
                             //category not available
                             echo "<option value='0'>Category Not Availbe.</option>";
                        }

                    ?>


                        <option value="0">Test Category</option>
                    </select>
                </td>
             </tr>

             <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";} ?>type="radio" name="featured" value="No"> No
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
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
             </tr>

         </table>

        </form>

        <?php
        
           if(isset($_POST['submit']))
           {
                //echo "Button Clicked";

                //1.Get all the details from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];


                //2. Upload the image if selected 
                if(isset($_FILES['image']['name']))
                {
                    //Upload button Clicked
                    $image_name = $_FILES['image']['name']; //New Image

                    // check if the file is available or not 
                    if($image_name!="")
                    {
                        //Image is available
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name".rand(0000, 9999).'.'.$ext;

                        // Get the src path and dstnt path
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/food/".$image_name;

                        //Upload the image 
                        $upload = move_uploaded_file($src_path, $dest_path);
            
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image</div>";
                            // Redirect to manage food page 
                            header('location:'.SITEURL.'admin/manage-food.php');

                            die();
                        }
                         //3. Remove the image if new image is uploaded and current image exist
                        //B. Remove current image if Availble
                        if($current_image!="")
                        {
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove Current Image.</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');

                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name =$current_image;
                    }
                }
                else
                {
                    $image_name =$current_image;
                }

               

                //4. Update the food and database 

                $sql3 = "UPDATE tbl_food SET
                  title = '$title',
                  description = '$description',
                  price = '$price',
                  image_name = '$image_name',
                  category_id = '$category',
                  featured = '$featured',
                  active = '$active'
                  WHERE id='$id'
                ";
                
                  $res3 = mysqli_query($conn, $sql3);
                   
                  if($res3==true)
                  {
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                  }
                  else
                  {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                  }

                //Redirect to Manage Food with Session Message.


           }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>