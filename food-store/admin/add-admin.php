<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
          if(isset($_SESSION['add'])) // checking wether the session is  set or not 
          {
            echo $_SESSION['add']; // display the session message if set
            unset($_SESSION['add']); // remove session message 
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
            
        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
  // Process the value from Form and Save it in Database

  // Check whether the submit button is clicked or not  
  if(isset($_POST['submit']))
  {
    // Button clicked
    // echo"Button Clicked";

    //1. Get the Data from Form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password = md5($_POST['password']); //Password Encryption /w MD5
    
    //2. SQL Queryto save the data into Database
    $sql = "INSERT INTO tbl_admin SET
        full_name= '$full_name',
        username= '$username',
        password= '$password'
    ";

    // 3. Executing query and Saving Data into Database 
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the data (Query is executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //Data Inserted
        //echo "Data Inserted";
        // create a session variable  to display a message 
        $_SESSION['add'] = "Admin Added Succesfully";
        // redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //failed to insert data
        //echo "Failed to Insert Data";
        // create a session variable  to display a message 
        $_SESSION['add'] = "Failed to Add Admin";
        // redirect page to Add Admin
        header("location:".SITEURL.'admin/add-admin.php');
    }


  }
  
?>